<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function comentarios()
    {
        return $this->hasMany(Comment::class);
    }
}
