<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }
}
