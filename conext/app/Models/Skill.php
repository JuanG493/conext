<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function projectUsers()
    {
        return $this->belongsToMany(ProjectUser::class, 'project_user_skill')
            ->withPivot('points')
            ->withTimestamps();
    }
    public function challengeUsers()
    {
        return $this->belongsToMany(ChallengeUser::class, 'challenge_user_skill')
            ->withPivot('points')
            ->withTimestamps();
    }
}
