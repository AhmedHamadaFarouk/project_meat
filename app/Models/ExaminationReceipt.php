<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationReceipt extends Model
{
    use HasFactory;


    protected $fillable = [
        "date",
        "slaughter_date",
        "number_ear",
        "meat_temp",
        "meat_color",
        "meat_smell",
        "meat_texture",
        "store_id",
        "supplier_id",
        "product_id",
        "quantity",
        "notes",
        "photo",

    ];

    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->attributes['photo'] != null ? asset('storage/ExaminationReceipt/' . $this->attributes['photo']) : null;
    }



    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
