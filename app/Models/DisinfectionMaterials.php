<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisinfectionMaterials extends Model
{
    use HasFactory;


    protected $fillable = [
        "date",
        "product_id",
        "Quantity",
        "codeProduct",
        "batchNumber",
        "dataProduction",
        "dataFinished",
        "type",
        "photo",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
