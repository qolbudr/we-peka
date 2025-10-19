<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotaMaba extends Model
{
    protected $fillable = [
        'university_id',
        'year',
        'quota',
        'link',
        'notes',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
