<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignTagController extends Controller
{
    public function index()
    {
        $data = [
            'tags' => Tag::withCount(['campaigns'])->where('tag_category_id', 3)->get()
        ];

        return view("campaign_tag.index", $data);
    }

    public function create()
    {
        return view("campaign_tag.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            Tag::create([
                'tag_name' => $request->name,
                'tag_category_id' => 3
            ]);
    
            return redirect()->back()->with('success', 'New Campaign Tag created successfully!');
    }

    public function edit(Tag $campaign_tag)
    {
        $data = [
            'tag' => $campaign_tag
        ];

        return view("campaign_tag.edit", $data);
    }

    public function update(Request $request, Tag $campaign_tag)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            $campaign_tag->update([
                'tag_name' => $request->name
            ]);

            return redirect()->route('admin.campaign.tag.index')->with('success', 'Campaign Tag Updated successfully!');
    }

    public function destroy(Tag $campaign_tag)
    {
        $campaign_tag->delete();
        return redirect()->back()->with('success', "Campaign Tag deleted successfully!");
    }

    public function addStatusToCampaign(Request $request)
    {
        DB::beginTransaction();
        try {
           
            $tag = Tag::find($request->tagId);

            $tag->campaigns()->syncWithoutDetaching($request->campaignIds);
    
            DB::commit();
    
            return response()->json(['status'=>'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status'=>'error'], 500);
        }
    }
    
    public function tagCampaigns(Tag $tag)
    {
        $data = [
            'tag' => $tag,
            'campaigns' => $tag->campaigns
        ];

        return view('campaign_tag.tag_campaigns', $data);
    }
}
