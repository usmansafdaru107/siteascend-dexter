<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Company;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function index()
    {
        $data = [
            'campaigns' => Campaign::all(),
            'tags' => Tag::where('tag_category_id', 3)->get()
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
        $request->validate([
            'campaignName' => 'required|min:3|max:255'
        ]);
        DB::beginTransaction();
        try {
            $campaign = Campaign::create([
                'name' => $request->campaignName,
            ]);

            $campaign->companies()->attach($request->companies);
    
            DB::commit();
    
            return redirect()->back()->with('success', 'New Campaign created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function edit(Campaign $campaign)
    {

        $data = [
            'companies' => Company::all(),
            'campaign' => $campaign
        ];

        return view("campaign.edit", $data);
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'campaignName' => 'required|min:3|max:255'
        ]);
        
        DB::beginTransaction();
        try {
            
            $campaign->update([
                'name' => $request->campaignName,
            ]);

            $campaign->companies()->sync($request->companies);
    
            DB::commit();
    
            return redirect()->route("admin.campaign.index")->with('success', 'Campaign Updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->back()->with('success', 'Campaign delete successfully!');
    }

    public function companyCampaigns(Campaign $campaign)
    {
        $data = [
            'campaign' => $campaign,
            'companies' => $campaign->companies
        ];

        return view('campaign.campaign_companies', $data);
    }

    public function updateStatus(Request $request)
    {
        $campaign  = Campaign::find($request->campaignId)->first()->companies()->updateExistingPivot($request->companyId, [
            'status_id' => $request->status,
        ]);
        return response()->json(['success'=>'Record Updated!']);
    }
}
