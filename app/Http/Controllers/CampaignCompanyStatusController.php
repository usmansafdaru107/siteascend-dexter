<?php

namespace App\Http\Controllers;

use App\Models\CampaignCompanyStatus;

class CampaignCompanyStatusController extends Controller
{
    public function index()
    {
        return response()->json(CampaignCompanyStatus::select('id', 'status_name')->get());
    }
}
