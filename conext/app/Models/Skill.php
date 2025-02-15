<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'slug'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'skill_user')
            ->withPivot('total_points');
    }

    public function qualifications()
    {
        return $this->belongsToMany(Qualification::class, 'qualification_skill')
            ->withPivot('points');
    }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
