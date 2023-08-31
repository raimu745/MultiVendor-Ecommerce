<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    
    protected $guard = 'admin';

    public function Vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

    public function VendorBussinessDetail()
    {
        return $this->belongsTo(VendorBussinessDetail::class,'vendor_id');
    }

    public function VendorBankDetail(){
        return $this->belongsTo(VendorBankDetail::class,'vendor_id');
    }
}
