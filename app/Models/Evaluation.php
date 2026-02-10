<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'internship_id',
        'supervisor_id',
        'evaluation_text',
        'score',
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
}
