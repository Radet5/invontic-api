<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InvoiceType extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
