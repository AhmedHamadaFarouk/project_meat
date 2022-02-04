<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeatReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_date_slaughter',
        'end_date_slaughter',
        'name_slaughterhouse',
        'permit_number',
        'operative_number',
        'type',
        'meat_temp',
        'meat_color',
        'meat_smell',
        'meat_texture',
        'notes',
        'photo',
        'before_receiving',
        'after_receiving',
        'jolly',
    ];


    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->attributes['photo'] != null ? asset('storage/MeatReceipt/' . $this->attributes['photo']) : null;
    }
}
