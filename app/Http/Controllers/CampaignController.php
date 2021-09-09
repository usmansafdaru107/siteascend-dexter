<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Company;
use App\Models\Role;
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
            'companies' => Company::all(),
            'dgrs' => Role::where('name', 'dgr')->first()->users()->get(),
            'cres' => Role::where('name', 'cre')->first()->users()->get(),
            'dsrs' => Role::where('name', 'dsr')->first()->users()->get(),
            'csrs' => Role::where('name', 'csr')->first()->users()->get(),
            'tags' => Tag::where('tag_category_id', 3)->get(),
            'campaignTags' => Tag::where('tag_category_id', 3)->get()
        ];

        return view("campaign.create", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'clientName' => 'required|max:255',
            'campaignName' => 'required|max:255',
            'solution' => 'required|max:255',
            'solutionURL' => 'required|max:255',
            'salesRep' => 'required|max:255',
            'salesRepEmail' => 'required|email|max:255',
            'salesRepNumber' => 'required|max:255',
            'salesRepBridge' => 'required|max:255',
            'calendarAccess' => 'required|max:255',
            'calendarUsername' => 'required|max:255',
            'calendarPassword' => 'required|max:255',
            'calendarInviteAdmin' => 'required|max:255',
            'cre' => 'required|exists:users,id',
            'dsr' => 'required|exists:users,id',
            'dgr' => 'required|array|min:1',
            "dgr.*"  => "exists:users,id",
            'DGRAlias' => 'required|min:3|max:255',
            'csr' => 'required|exists:users,id',
            'CSRAlias' => 'required|min:3|max:255',
            'campaignTag' => 'required|array|min:1',
            'campaignTag.*' => 'exists:tags,id',
            'campaignStartDate' => 'required|date|date_format:Y-m-d',
            'expectedEndDate' => 'required|date|date_format:Y-m-d',
            'companies' => 'required|array|min:1',
            'companies.*' => 'exists:companies,id',
        ]);
        DB::beginTransaction();
        try {
            $campaign = Campaign::create([
                'clientName' => $request->clientName,
                'name' => $request->campaignName,
                'solution' => $request->solution,
                'solutionURL' => $request->solutionURL,
                'salesRep' => $request->salesRep,
                'salesRepEmail' => $request->salesRepEmail,
                'salesRepNumber' => $request->salesRepNumber,
                'salesRepBridge' => $request->salesRepBridge,
                'calendarAccess' => $request->calendarAccess,
                'calendarUsername' => $request->calendarUsername,
                'calendarPassword' => $request->calendarPassword,
                'calendarInviteAdmin' => $request->calendarInviteAdmin,
                'DGRAlias' => $request->DGRAlias,
                'CSRAlias' => $request->CSRAlias,
                'campaignStartDate' => $request->campaignStartDate,
                'expectedEndDate' => $request->expectedEndDate,
                'actualFinishedDate' => $request->actualFinishedDate,
                'campaignGoal' => $request->campaignGoal
            ]);

            $campaign->companies()->syncWithoutDetaching($request->companies);
            $campaign->tags()->syncWithoutDetaching($request->campaignTag);
            $campaign->users()->syncWithoutDetaching($request->dgr);
            $campaign->users()->syncWithoutDetaching([$request->cre]);
            $campaign->users()->syncWithoutDetaching([$request->dsr]);
            $campaign->users()->syncWithoutDetaching([$request->csr]);
    
            DB::commit();
    
            return redirect()->back()->with('success', 'New Campaign created successfully!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function edit(Campaign $campaign)
    {
        $data = [
            'companies' => Company::all(),
            'dgrs' => Role::where('name', 'dgr')->first()->users()->get(),
            'cres' => Role::where('name', 'cre')->first()->users()->get(),
            'dsrs' => Role::where('name', 'dsr')->first()->users()->get(),
            'csrs' => Role::where('name', 'csr')->first()->users()->get(),
            'tags' => Tag::where('tag_category_id', 3)->get(),
            'campaignTags' => Tag::where('tag_category_id', 3)->get(),
            'campaign' => $campaign

        ];

        return view("campaign.edit", $data);
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'clientName' => 'required|max:255',
            'campaignName' => 'required|max:255',
            'solution' => 'required|max:255',
            'solutionURL' => 'required|max:255',
            'salesRep' => 'required|max:255',
            'salesRepEmail' => 'required|email|max:255',
            'salesRepNumber' => 'required|max:255',
            'salesRepBridge' => 'required|max:255',
            'calendarAccess' => 'required|max:255',
            'calendarUsername' => 'required|max:255',
            'calendarPassword' => 'required|max:255',
            'calendarInviteAdmin' => 'required|max:255',
            'cre' => 'required|exists:users,id',
            'dsr' => 'required|exists:users,id',
            'dgr' => 'required|array|min:1',
            "dgr.*"  => "exists:users,id",
            'DGRAlias' => 'required|min:3|max:255',
            'csr' => 'required|exists:users,id',
            'CSRAlias' => 'required|min:3|max:255',
            'campaignTag' => 'required|array|min:1',
            'campaignTag.*' => 'exists:tags,id',
            'campaignStartDate' => 'required|date|date_format:Y-m-d',
            'expectedEndDate' => 'required|date|date_format:Y-m-d',
            'companies' => 'required|array|min:1',
            'companies.*' => 'exists:companies,id',
        ]);
        DB::beginTransaction();
        try {
            $campaign->update([
                'clientName' => $request->clientName,
                'name' => $request->campaignName,
                'solution' => $request->solution,
                'solutionURL' => $request->solutionURL,
                'salesRep' => $request->salesRep,
                'salesRepEmail' => $request->salesRepEmail,
                'salesRepNumber' => $request->salesRepNumber,
                'salesRepBridge' => $request->salesRepBridge,
                'calendarAccess' => $request->calendarAccess,
                'calendarUsername' => $request->calendarUsername,
                'calendarPassword' => $request->calendarPassword,
                'calendarInviteAdmin' => $request->calendarInviteAdmin,
                'DGRAlias' => $request->DGRAlias,
                'CSRAlias' => $request->CSRAlias,
                'campaignStartDate' => $request->campaignStartDate,
                'expectedEndDate' => $request->expectedEndDate,
                'actualFinishedDate' => $request->actualFinishedDate,
                'campaignGoal' => $request->campaignGoal
            ]);

            $campaign->companies()->sync($request->companies);
            $campaign->tags()->sync($request->campaignTag);
            $campaign->users()->sync($request->dgr);
            $campaign->users()->syncWithoutDetaching([$request->cre]);
            $campaign->users()->syncWithoutDetaching([$request->dsr]);
            $campaign->users()->syncWithoutDetaching([$request->csr]);
    
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
