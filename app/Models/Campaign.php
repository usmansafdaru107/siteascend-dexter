<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function companies()
    {
        return $this->belongsToMany(Company::class, "campaigns_companies")->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "users_campaigns")->withPivot('status')->withTimestamps();
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('l jS F Y h:i:s A');
    }
}
