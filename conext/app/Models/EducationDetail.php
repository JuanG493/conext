<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
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
