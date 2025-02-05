<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = "educationdetails";
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function instituciones()
    {
        return $this->belongsTo(School::class);
    }
}
