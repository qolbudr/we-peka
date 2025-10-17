<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobIntelligence extends Model
{
    protected $fillable = [
        'intelligence_id',
        'name',
    ];

    public function intelligence()
    {
        return $this->belongsTo(Intelligence::class);
    }
}
