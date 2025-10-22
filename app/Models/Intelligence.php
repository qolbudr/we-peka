<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intelligence extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function jobIntelligences()
    {
        return $this->hasMany(JobIntelligence::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'intelligence_id');
    }
}
