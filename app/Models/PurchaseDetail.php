<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
  protected $fillable = ['purchase_id', 'product_id', 'quantity', 'price', 'total'];
  protected $dates    = ['created_at', 'updated_at'];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
  public function purchase()
  {
    return $this->belongsTo(Purchase::class);
  }
}
