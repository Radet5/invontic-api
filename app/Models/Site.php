<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization_id',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function inventoryRecaps()
    {
        return $this->hasMany(InventoryRecap::class);
    }
}
