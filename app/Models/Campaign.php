<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['clientName', 'name', 'solution', 'solutionURL', 'salesRep', 'salesRepEmail', 'salesRepNumber', 'salesRepBridge', 'calendarAccess', 'calendarUsername', 'calendarPassword', 'calendarInviteAdmin', 'DGRAlias', 'CSRAlias', 'campaignStartDate', 'expectedEndDate', 'actualFinishedDate', 'campaignGoal'];

    public function companies()
    {
        return $this->belongsToMany(Company::class, "campaigns_companies")->withPivot('status_id')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, "campaign_tags")->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "users_campaigns")->withTimestamps();
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/y');
        // return \Carbon\Carbon::parse($value)->format('l jS F Y h:i:s A');
    }

    public function getCampaignStartDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/y');
        // return \Carbon\Carbon::parse($value)->format('l jS F Y');
    }

    public function getExpectedEndDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/y');
        // return \Carbon\Carbon::parse($value)->format('l jS F Y');
    }
    
    public function getActualFinishedDateAttribute($value) {
        if($value)
            return \Carbon\Carbon::parse($value)->format('d/m/y');
            // return \Carbon\Carbon::parse($value)->format('l jS F Y');
        return "";
    }

    public function getActualAttribute($field){
        return $this->attributes[$field];
    }
}
