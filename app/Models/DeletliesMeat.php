<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeletliesMeat extends Model
{
    use HasFactory;

    protected $fillable = [
        "meat_toxin_id",
        "amount",
        "weight",
        "testicle",
        "price",
        "type",
    ];

    public function meattoxin()
    {
        return $this->belongsTo(MeatToxin::class,'meat_toxin_id');
    }
}
