<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryRecap extends Model
{
    use HasFactory;

    public function accountingPeriod()
    {
        return $this->belongsTo(AccountingPeriod::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function inventoryRecapRecords()
    {
        return $this->hasMany(InventoryRecapRecord::class);
    }
}
