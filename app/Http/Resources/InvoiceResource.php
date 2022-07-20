<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Supplier;
use App\Models\InvoiceType;
use Log;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $records = $this->invoiceRecords()->with('good')->get();
        $invoiceTotal = $records->sum(function ($record) {
            $total = $record->unit_price * $record->quantity * (1 + $record->good->tax_rate);
            return $total;
        });
        return [
            'id' => $this->id,
            'supplier_id' => $this->supplier_id,
            'supplier_name' => Supplier::find($this->supplier_id)->name,
            'supplier_invoice_id' => $this->supplier_invoice_id,
            'invoice_date' => $this->invoice_date,
            'invoice_type_id' => $this->invoice_type_id,
            'invoice_type' => InvoiceType::find($this->invoice_type_id)->name,
            'invoice_total' => $invoiceTotal,
            'accounting_date' => $this->accounting_date,
            'invoice_records' => $this->whenLoaded('invoiceRecords'),
            'updated_at' => $this->updated_at,
        ];
    }
}
