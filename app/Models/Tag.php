<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name', 'tag_category_id'];

    public function category() {
        return $this->belongsTo(TagCategory::class, "tag_categories");
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, "contact_tags")->withTimestamps();
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, "company_tags")->withTimestamps();
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, "campaign_tags")->withTimestamps();
    }

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('l jS F Y h:i:s A');
    }
}
