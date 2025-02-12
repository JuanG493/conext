<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = ['submission_id', 'user_id', 'feedback', 'exp_points'];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'qualification_skill')
            ->withPivot('points')
            ->withTimestamps();
    }
}
