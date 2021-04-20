<?php

namespace App\Models;

use App\Models\SaleProduct;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function saleProducts(){
        return $this->hasMany(SaleProduct::class);
    }
    
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    
}
