<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LkpdAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}