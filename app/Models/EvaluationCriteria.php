<?php

namespace App\Models;

use App\Enums\EvalutaionCriteriaCategory;
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
        'category' => EvalutaionCriteriaCategory::class,
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
