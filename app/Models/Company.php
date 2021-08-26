<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street_address',
        'city',
        'state',
        'zip',
        'country',
        'hq_phone',
        'ticker',
        'revenue',
        'revenue_range',
        'marketing_dept_budget',
        'finance_dept_budget',
        'it_dept_budget',
        'hr_dept_budget',
        'employees',
        'employees_range',
        'primary_industry',
        'primary_sub_industry',
        'all_industries',
        'all_sub_industries',
        'zoominfo_company_profile_url',
        'linkedin_company_profile_url',
        'ownership_type',
        'business_model',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, "campaigns_companies")->withPivot('status')->withTimestamps();
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('l jS F Y h:i:s A');
    }
}
