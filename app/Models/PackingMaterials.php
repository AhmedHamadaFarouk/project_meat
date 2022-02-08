<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackingMaterials extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->attributes['photo'] != null ? asset('storage/PackingMaterials/' . $this->attributes['photo']) : null;
    }

}
