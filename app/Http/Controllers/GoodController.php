<?php

namespace App\Http\Controllers;

use App\Models\good;
use App\Models\Supplier;
use App\Models\Organization;
use Illuminate\Http\Request;

class GoodController extends Controller
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

    public function supplierIndex(Supplier $supplier)
    {
        return json_encode($supplier->goods()->select('id', 'name', 'supplier_id', 'department', 'item_code', 'tax_rate')->get());
    }

    public function organizationGoodsDepartments(Organization $organization)
    {
        return json_encode($organization->goodsDepartments());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, good $good)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(good $good)
    {
        //
    }
}
