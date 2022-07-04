<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function invoices()
    {
        $site_ids = $this->sites()->pluck('id');
        return Invoice::whereIn('site_id', $site_ids)->paginate(10);
    }

    public function suppliers()
    {
       $site_ids = $this->sites()->pluck('id');
       return Supplier::whereIn('site_id', $site_ids)->get();
    }
}
