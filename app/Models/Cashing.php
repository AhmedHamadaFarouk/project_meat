<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cashing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function meattoxin()
    {
        return $this->belongsTo(MeatToxin::class, 'meat_toxin_id');
    }

    public function Report()
    {
        return $this->morphMany('App\Models\Report', 'reportable');
    }
}
