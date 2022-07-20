<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

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

    public function lockedByUser()
    {
        $token = DB::table('personal_access_tokens')->find($this->locked_by);
        return User::find($token->tokenable_id);
    }

    public function isLockExpired()
    {
        //$token = DB::table('personal_access_tokens')->find($this->locked_by);
        $time = $this->updated_at;
        $time = strtotime($time);
        $time = $time + (5 * 60);
        $now = time();
        if ($now > $time) {
            return true;
        }
        return false;
    }

    public function invoiceRecords()
    {
        return $this->hasMany(InvoiceRecord::class);
    }
}
