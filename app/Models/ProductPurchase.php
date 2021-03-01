<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function productFormat(){
        return $this->belongsTo(ProductFormat::class);
    }

}
