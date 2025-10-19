<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'university_id',
        'program_study_id',
        'name',
        'gender',
        'graduation_year',
    ];

    protected $casts = [
        'gender' => Gender::class,

    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function programStudy()
    {
        return $this->belongsTo(ProgramStudy::class);
    }
}