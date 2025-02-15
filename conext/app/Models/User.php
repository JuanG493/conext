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
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_by', 'following');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'following', 'followed_by');
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function educationDetails()
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
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'creator_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class, 'user_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_user')
            ->withPivot('total_points');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
