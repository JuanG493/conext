<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'challenge_user')
            ->withPivot(['status', 'awarded_experience', 'feedback', 'submitted_at'])
            ->withTimestamps();
    }
}
