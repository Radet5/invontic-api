<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryRecapRecord extends Model
{
    use HasFactory;

    public function inventoryRecap()
    {
        return $this->belongsTo(InventoryRecap::class);
    }

    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}
