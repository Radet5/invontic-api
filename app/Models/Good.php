<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    public function inventoryCategory()
    {
        return $this->belongsTo(InventoryCategory::class);
    }

    public function invoiceRecords()
    {
        return $this->hasMany(InvoiceRecord::class);
    }

    public function inventoryRecapRecords()
    {
        return $this->hasMany(InventoryRecapRecord::class);
    }
}
