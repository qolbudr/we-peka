<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Model;

class TypeStudyDetail extends Model
{
    protected $fillable = [
        'type_study_id',
        'science_specialization',
        'level',
        'purpose',
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function typeStudy()
    {
        return $this->belongsTo(TypeStudy::class);
    }
}