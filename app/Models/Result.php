<?php

namespace App\Models;

use App\Enums\EvaluationCriteriaCategory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_id',
        'intelligence_id',
        'score',
        'category'
    ];

    protected $casts = [
        'category' => EvaluationCriteriaCategory::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function intelligence()
    {
        return $this->belongsTo(Intelligence::class);
    }

    public function answers()
    {
        return $this->hasMany(Answers::class);
    }
}
