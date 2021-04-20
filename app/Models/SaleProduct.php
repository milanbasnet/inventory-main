<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }
}
