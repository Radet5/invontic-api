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
        $perPage = request()->per_page ?? 10;
        return Invoice::whereIn('site_id', $site_ids)->orderBy('invoice_date', 'desc')->orderBy('supplier_id')->orderBy('id')->paginate($perPage);
    }

    public function suppliers()
    {
       $site_ids = $this->sites()->pluck('id');
       return Supplier::whereIn('site_id', $site_ids)->get();
    }

    public function goodsDepartments()
    {
        $supplier_ids = $this->suppliers()->pluck('id');
        return Good::whereIn('supplier_id', $supplier_ids)->select('department')->distinct()->get();
    }

    public function invoiceTypes()
    {
        $site_ids = $this->sites()->pluck('id');
        return InvoiceType::whereIn('site_id', $site_ids)->get();
    }

    public function isResourceOwner($resource)
    {
        $site_ids = $this->sites()->pluck('id')->toArray();
        return $resource->site_id && in_array($resource->site_id, $site_ids);
    }
}
