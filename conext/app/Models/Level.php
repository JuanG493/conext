<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
}
