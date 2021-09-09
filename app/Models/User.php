<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ADMIN = "admin";
    public const DGR = "dgr";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, "users_campaigns")->withTimestamps();
    }

    public function firstName()
    {
        return explode(' ', $this->name, 2)[0];

    }

    public function lastName()
    {
        return explode(' ', $this->name, 2)[1];

    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('l jS F Y h:i:s A');
    }

}
