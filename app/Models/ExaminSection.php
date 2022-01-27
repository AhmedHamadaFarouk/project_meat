<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminSection extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "examin_id",
        "section_id",
        "categories",
        "recipt_code",
        "notes",

    ];


    public function examination_meats()
    {
        return $this->belongsTo(ExaminationMeat::class, 'examin_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
