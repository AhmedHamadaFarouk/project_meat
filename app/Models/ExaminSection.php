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
        "recipt_code",
        "notes",

    ];


    public function examination_receipts()
    {
        return $this->belongsTo(ExaminationReceipt::class, 'examin_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
