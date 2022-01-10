<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DispensePacking extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'date',
        'supplydate',
        'workordernumber',
        'type',
        'product_id',
        'Quantity',
        'codeProduct',
        'batchNumber',
        'notes',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
