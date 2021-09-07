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
            'tags' => Tag::where('tag_category_id', 3)->get()
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

    public function edit(Tag $tag)
    {
        $data = [
            'tag' => $tag
        ];

        return view("campaign_tag.edit", $data);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            $tag->update([
                'tag_name' => $request->name
            ]);

            return redirect()->route('admin.campaign.tag.index')->with('success', 'Campaign Tag Updated successfully!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
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
