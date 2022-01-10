<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExchangeRawMaterials extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        "date",
        "codeJop",
        "product_id",
        "Quantity",
        "codeProduct",
        "batchNumber",
        "dataProduction",
        "dataFinished",
        "notes",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
