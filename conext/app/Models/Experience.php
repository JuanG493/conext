<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = "Experience";

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
