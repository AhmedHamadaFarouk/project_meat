<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeatToxin extends Model
{
    use HasFactory;

    protected $fillable = [
       "type_meat",
       "receipt_code",
       "photo",
       "meat_receipt_id",
    ];


    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->attributes['photo'] != null ? asset('storage/MeatToxin/' . $this->attributes['photo']) : null;
    }

    public function Deletlies()
    {
        return $this->hasMany(DeletliesMeat::class);
    }


    public function Report()
    {
        return $this->morphMany('App\Models\Report', 'reportable');
    }

    public function meatReceipt()
    {
        return $this->belongsTo(MeatReceipt::class,'meat_receipt_id');
    }
}
