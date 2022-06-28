<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->can('editUsers')) {
            return redirect()->back();
        }

        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('createUsers')) {
            return redirect()->back();
        }

        return view('admin.user.create');
    }

    public function organizationCreate(Organization $organization)
    {
        if (!Auth::user()->can('createUsers')) {
            return redirect()->back();
        }

        return view('admin.organization.user.create', compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('createUsers')) {
            return redirect()->back();
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->organization_id = $request->organization_id;
        $user->save();

        return redirect()->route('admin.organization.edit', $request->organization_id);
    }

    public function organizationStore(Request $request, Organization $organization)
    {
        if(!Auth::user()->can('createUsers')) {
            return redirect()->back();
        }

        $request->organization_id = $organization->id;
        return $this->store($request);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!Auth::user()->can('editUsers')) {
            return redirect()->back();
        }

        return view('admin.user.edit', compact('user'));
    }

    public function organizationEdit(Organization $organization, User $user)
    {
        if(!Auth::user()->can('editUsers')) {
            return redirect()->back();
        }

        return view('admin.organization.user.edit')->with(compact('user'))->with(compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!Auth::user()->can('editUsers')) {
            return redirect()->back();
        }

        $user->update($request->all());
        return redirect()->back();
    }

    public function organizationUpdate(Request $request, Organization $organization, User $user)
    {
        if(!Auth::user()->can('editUsers')) {
            return redirect()->back();
        }

        $request->organization_id = $organization->id;
        return $this->update($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!Auth::user()->can('deleteUsers')) {
            return redirect()->back();
        }

        $user->delete();
        return redirect()->route('dashboard');
    }
}
