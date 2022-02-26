<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPurchase extends Model
{
    use HasFactory;
    protected $table = 'monthly_purchase';
    protected $fillable = [
        'item_name',
        'item_number',
        'df',
        'add_adf',
        'sites',
        'identity',
        'client',
        'month_year',
  
    ];
}
