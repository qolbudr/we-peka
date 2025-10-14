<?php

namespace App\Models;

use App\Enums\Level;
use Illuminate\Database\Eloquent\Model;

class ProgramStudy extends Model
{
    protected $fillable = [
        'university_id',
        'name',
        'accreditation',
        'level',
        'specialization',
    ];

    protected $casts = [
        'level' => Level::class,
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function alumnis()
    {
        return $this->hasMany(Alumni::class);
    }
}