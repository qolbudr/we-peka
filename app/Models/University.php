<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'type_study_id',
        'name'
    ];

    public function typeStudy()
    {
        return $this->belongsTo(TypeStudy::class);
    }

    public function quotaMabas()
    {
        return $this->hasMany(QuotaMaba::class);
    }

    public function programStudies()
    {
        return $this->hasMany(ProgramStudy::class);
    }

    public function alumnis()
    {
        return $this->hasMany(Alumni::class);
    }
}