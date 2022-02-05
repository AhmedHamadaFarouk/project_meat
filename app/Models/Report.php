<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "reportable_type",
        "reportable_id",
        "user_id",
        "type",
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function reportable()
    {
        return $this->morphTo();
    }
}
