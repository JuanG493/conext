<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function educacion()
    {
        return $this->belongsTo(Education::class);
    }
}
