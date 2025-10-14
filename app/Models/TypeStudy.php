<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeStudy extends Model
{
    protected $fillable = [
        'name'
    ];

    public function typeStudyDetails()
    {
        return $this->hasMany(TypeStudyDetail::class);
    }

    public function universities()
    {
        return $this->hasMany(University::class);
    }
}