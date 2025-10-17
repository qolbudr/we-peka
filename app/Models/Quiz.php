<?php

namespace App\Models;

use App\Enums\QuizCategory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
    ];

    protected $casts = [
        'category' => QuizCategory::class,
    ];

    public function evaluationCriterias()
    {
        return $this->hasMany(EvaluationCriteria::class);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
