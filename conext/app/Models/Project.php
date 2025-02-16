<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['creator_id', 'slug', 'title', 'description', 'level_required', 'status'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
