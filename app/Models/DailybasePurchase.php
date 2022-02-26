<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailybasePurchase extends Model
{
    use HasFactory;
    protected $table = 'dailybases_purchase';
    protected $fillable = [
       'item_name',
       'item_number',
       'stock_in_hand',
         'stock_in_transit',
            'mtd_sales',
            'pending_customer_order',
            'identity',
            'client',
            'sites',
  
    ];
}
