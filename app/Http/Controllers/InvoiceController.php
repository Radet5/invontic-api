<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Resources\InvoiceCollection;
use App\Http\Resources\InvoiceResource;

use Auth;
use Hash;

class InvoiceController extends Controller
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

    public function organizationIndex(Organization $organization)
    {
        if (Auth::user()->organization->id !== $organization->id) {
            abort(401, 'User is not authorized to view this resource');
        }
        return new InvoiceCollection($organization->invoices());
    }

    public function organizationInvoiceTypes(Organization $organization)
    {
        if (!Auth::user()->organization->id !== $organization->id) {
            abort(401, 'User is not authorized to view this resource');
        }
        return json_encode($organization->invoiceTypes());
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
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $invoice)
    {
        if(!Auth::user()->organization->isResourceOwner($invoice)) {
            abort(401, 'User is not authorized to view this resource');
        }
        return new InvoiceResource($invoice->load('invoiceRecords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}
