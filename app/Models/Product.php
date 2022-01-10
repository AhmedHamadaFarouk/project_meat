<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
       'name',
       'quantity',
       'order_number',
       'date_supply',
       'type',
       'code',
       'number_product',
       'notes',
       'date',
    ];
}
