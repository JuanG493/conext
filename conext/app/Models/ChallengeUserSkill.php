<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeUserSkill extends Model
{
    public function habilidades()
    {
        return $this->belongsToMany(Skill::class, "challenge_user_skill")
            ->withPivot('points')
            ->withTimestamps();
    }
}
