<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WasteLog extends Model
{
    use HasFactory;

    protected $fillable = [
       "date",
       "Quantity",
       "name_company",
       "notes",
       "product_id",
       "type",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
