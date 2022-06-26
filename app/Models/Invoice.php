<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function invoiceType()
    {
        return $this->belongsTo(InvoiceType::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function invoiceRecords()
    {
        return $this->hasMany(InvoiceRecord::class);
    }
}
