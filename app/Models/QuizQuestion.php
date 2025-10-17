<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'quiz_id',
        'intelligence_id',
        'question'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function intelligence()
    {
        return $this->belongsTo(Intelligence::class);
    }
}
