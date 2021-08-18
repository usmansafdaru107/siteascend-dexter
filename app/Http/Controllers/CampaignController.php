<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignCompany;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function index()
    {
        $data = [
            'campaigns' => Campaign::all()
        ];
        return view("campaign.index", $data);
    }

    public function create()
    {
        $data = [
            'companies' => Company::all()
        ];

        return view("campaign.create", $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $campaign = Campaign::create([
                'name' => $request->campaignName,
            ]);
    
            foreach ($request->companies as $key => $value) {
                CampaignCompany::create([
                    "campaign_id" => $campaign->id,
                    "company_id" => $value
                ]);
            }
            DB::commit();
    
            return redirect()->back()->with('success', 'New Campaign created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function edit(Request $request, Campaign $campaign)
    {

        DB::beginTransaction();
        try {
            $campaign = Campaign::create([
                'name' => $request->campaignName,
            ]);
    
            foreach ($request->companies as $key => $value) {
                CampaignCompany::create([
                    "campaign_id" => $campaign->id,
                    "company_id" => $value
                ]);
            }
            DB::commit();
    
            return redirect()->route("admin.campaign.index")->with('success', 'Campaign Updated successfully!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function update(Request $request)
    {
        dd($request);
        // return view("user.create");
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->back()->with('success', 'Campaign delete successfully!');
    }
}
