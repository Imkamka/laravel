<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}
