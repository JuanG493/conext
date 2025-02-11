<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function siguiendo()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_by', 'following');
    }

    public function seguidores()
    {
        return $this->belongsToMany(User::class, 'followers', 'following', 'followed_by');
    }
    public function experiencias()
    {
        return $this->hasMany(Experience::class);
    }
    public function educaciones()
    {
        return $this->hasMany(EducationDetail::class);
    }
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function nivel()
    {
        return $this->belongsTo(Level::class);
    }
    public function proyectos()
    {
        return $this->belongsToMany(Project::class, 'project_user')
            ->withPivot(['status', 'awarded_experience', 'feedback', 'submitted_at'])
            ->withTimestamps();
    }
    public function desafios()
    {
        return $this->belongsToMany(Challenge::class, 'challenge_user')
            ->withPivot(['status', 'awarded_experience', 'feedback', 'submitted_at'])
            ->withTimestamps();
    }
}
