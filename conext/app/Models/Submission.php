<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'project_id', 'solution_text', 'solution_path', 'submitted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }
}
