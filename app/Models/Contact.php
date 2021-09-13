<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'middle_name',
        'salutation',
        'suffix',
        'management_level',
        'department',
        'job_function',
        'job_title',
        'direct_phone_number',
        'dial_extension',
        'mobile_phone',
        'email_address',
        'supplemental_email',
        'zoominfo_contact_profile_url',
        'linkedin_contact_profile_url',
        'street',
        'city',
        'state',
        'zip',
        'country',
        'email_domain',
        'notes'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, "contact_tags")->withTimestamps();
    }

    public function name()
    {
        return $this->first_name ." ". $this->last_name;
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/y');
        // return \Carbon\Carbon::parse($value)->format('l jS F Y h:i:s A');
    }
}
