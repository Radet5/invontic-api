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

        $tokenId = explode("|", request()->bearerToken())[0];
        //User can actually checkout more than one so disabling this for now
        //$lockedInvoices = Invoice::where('locked_by', $tokenId)->get();
        ////clear the locked invoices
        //foreach ($lockedInvoices as $lockedInvoice) {
        //    $lockedInvoice->locked_by = null;
        //    $lockedInvoice->save();
        //}

        if ($invoice->locked_by !== null && $invoice->locked_by != $tokenId) {
            $user = $invoice->lockedByUser();
            if(!$invoice->isLockExpired()) {
                abort(401, 'Requested invoice is locked by ' . $user->name . ' (' . $user->email . ')');
            }
        }
        $invoice->locked_by = $tokenId;
        $invoice->touch();
        $invoice->save();

        return new InvoiceResource($invoice->load('invoiceRecords'));
    }

    public function clearInvoiceLock(Request $request)
    {
        $tokenId = explode("|", $request->bearerToken())[0];
        $invoices = Invoice::where('locked_by', $tokenId)->get();
        foreach ($invoices as $invoice) {
            $invoice->locked_by = null;
            $invoice->save();
        }
        return response()->json(['message' => 'Lock cleared', 'success' => true]);
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
