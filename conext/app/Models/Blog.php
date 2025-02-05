<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
