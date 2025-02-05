<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//
class ProjectUser extends Model
{
    public function habilidades()
    {
        return $this->belongsToMany(Skill::class, 'project_user_skill')
            ->withPivot('points')
            ->withTimestamps();
    }
}
