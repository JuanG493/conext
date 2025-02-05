<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeUser extends Model
{
    public function habilidades()
    {
        return $this->belongsToMany(Skill::class, "challenge_user_skill")
            ->withPivot('points')
            ->withTimestamps();
    }
}
