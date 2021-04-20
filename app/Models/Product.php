<?php

namespace App\Models;

use App\Models\StockAlert;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getActualPriceAttribute(){
        return $this->discount ? $this->price - ($this->price * $this->discount / 100):$this->price; 
    }

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function stockAlert(){
        return $this->hasOne(StockAlert::class);
    }
}
