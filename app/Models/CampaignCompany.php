<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCompany extends Model
{
    use HasFactory;

    protected $table = "campaigns_companies";

    protected $fillable = [
        'campaign_id',
        'company_id',
    ];

}
