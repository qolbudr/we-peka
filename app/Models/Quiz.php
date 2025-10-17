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
}
