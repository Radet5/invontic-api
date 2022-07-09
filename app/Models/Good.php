<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function inventoryCategory()
    {
        return $this->belongsTo(InventoryCategory::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
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
