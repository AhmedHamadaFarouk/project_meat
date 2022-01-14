<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationReceipt extends Model
{
    use HasFactory;


    protected $fillable = [
        "date",
        "slaughter_date",
        "Virtual_scan",
        "type",
        "number_ear",
        "notes",
        "quantity",
        "slaughterhouse",
        "product_id",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
