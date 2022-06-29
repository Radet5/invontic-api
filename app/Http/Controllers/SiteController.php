<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Organization;
use Illuminate\Http\Request;
use Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function organizationCreate(Organization $organization)
    {
        if(!Auth::user()->can('createSites')) {
            return redirect()->back();
        }

        return view('admin.organization.site.create', compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('createSites')) {
            return redirect()->back();
        }

        $site = new Site();
        $site->name = $request->name;
        $site->organization_id = $request->organization_id;
        $site->save();
        return redirect()->route('admin.organization.edit', $request->organization_id);
    }

    public function organizationStore(Request $request, Organization $organization)
    {
        if(!Auth::user()->can('createSites')) {
            return redirect()->back();
        }

        $request->organization_id = $organization->id;
        return $this->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    public function organizationEdit(Organization $organization, Site $site)
    {
        if(!Auth::user()->can('editOrganizations')) {
            return redirect()->back();
        }

        return view('admin.organization.site.edit', compact('organization', 'site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        if(!Auth::user()->can('editOrganizations')) {
            return redirect()->back();
        }

        $site->update($request->all());
        return redirect()->back();
    }

    public function organizationUpdate(Request $request, Organization $organization, Site $site)
    {
        if(!Auth::user()->can('editOrganizations')) {
            return redirect()->back();
        }

        $request->organization_id = $organization->id;
        return $this->update($request, $site);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        if(!Auth::user()->can('deleteSites')) {
            return redirect()->back();
        }

        $site->delete();
        return redirect('admin/dashboard');
    }
}
