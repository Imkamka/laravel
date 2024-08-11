<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePayment extends Model
{
    use HasFactory;

    public function purchase()
    {
        $this->belongsTo(Purchase::class, 'vendor_id', 'vendor_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
