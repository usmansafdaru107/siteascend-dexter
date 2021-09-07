<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    public function tags() {
        return $this->hasMany(Tag::class, "campaign_tags");
    }
}
