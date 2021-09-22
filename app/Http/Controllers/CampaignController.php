<?php

namespace App\Http\Controllers;

use App\Http\Requests\campaign\StoreCampaignRequest;
use App\Http\Requests\campaign\UpdateCampaignRequest;
use App\Models\Campaign;
use App\Models\CampaignCompanyStatus;
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
            'tags' => Tag::where('tag_category_id', Tag::CAMPAIGN)->get()
        ];
        return view("campaign.index", $data);
    }

    public function create()
    {
        $data = [
            'companies' => Company::all("id", "name"),
            'dgrs' => Role::where('name', 'dgr')->first()->users()->get(),
            'cres' => Role::where('name', 'cre')->first()->users()->get(),
            'dsrs' => Role::where('name', 'dsr')->first()->users()->get(),
            'csrs' => Role::where('name', 'csr')->first()->users()->get(),
            'tags' => Tag::where('tag_category_id', Tag::CAMPAIGN)->get(),
        ];

        return view("campaign.create", $data);
    }

    public function store(StoreCampaignRequest $request)
    {
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
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function edit(Campaign $campaign)
    {
        $data = [
            'companies' => Company::all("id", "name"),
            'dgrs' => Role::where('name', 'dgr')->first()->users()->get(),
            'cres' => Role::where('name', 'cre')->first()->users()->get(),
            'dsrs' => Role::where('name', 'dsr')->first()->users()->get(),
            'csrs' => Role::where('name', 'csr')->first()->users()->get(),
            'tags' => Tag::where('tag_category_id', Tag::CAMPAIGN)->get(),
            'campaign' => $campaign
        ];
        return view("campaign.edit", $data);
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
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

    public function campaignAccordion(Campaign $campaign)
    {
        $data = [
            'campaign' => $campaign,
            'companies' => $campaign->companies()->orderBy("name")->get()
        ];

        $dataOrdered = [
            "priority" => [],
            "call-back" => [],
            "hot" => [],
            "send-info" => [],
            "active" => [],
            "meeting-set" => [],
            "stay-out-sales-rep-request" => [],
            "stay-out-already-customer" => [],
        ];

        if($data['companies']) {
            foreach ($data['companies'] as $key => $company) {
                $status = CampaignCompanyStatus::find($company->pivot->status_id)->status_name;
                $dataOrdered[$status][] = $company;
            }
            $data['companies'] = call_user_func_array('array_merge', $dataOrdered);
        }
        return view('campaign.campaign_accordion', $data);
    }

    public function updateStatus(Request $request)
    {
        try {
            Campaign::find($request->campaignId)->companies()->updateExistingPivot($request->companyId, [
                'status_id' => $request->status
            ]);
            return response()->json(['success'=>'Record Updated!']);
        } catch (\Throwable $th) {
            return response()->json(['success'=>'false'], 500);
        }
    }

}
