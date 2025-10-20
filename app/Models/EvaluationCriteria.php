<?php

namespace App\Models;

use App\Enums\EvaluationCriteriaCategory;
use Illuminate\Database\Eloquent\Model;

class EvaluationCriteria extends Model
{
    protected $fillable = [
        'quiz_id',
        'min_score_range',
        'max_score_range',
        'category',
        'description',
    ];

    protected $casts = [
        'category' => EvaluationCriteriaCategory::class,
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
