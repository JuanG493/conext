<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = "Experience";
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
