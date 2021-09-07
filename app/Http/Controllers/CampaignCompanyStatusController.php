<?php

namespace App\Http\Controllers;

use App\Models\CampaignCompanyStatus;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class CampaignCompanyStatusController extends Controller
{
    public function index()
    {
        // dd(json_encode());
        return response()->json(CampaignCompanyStatus::select('id', 'status_name')->get());
    }
}
