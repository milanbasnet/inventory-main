<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\QuotationProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function quotationProducts(){
        return $this->hasMany(QuotationProduct::class);
    }
    
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
