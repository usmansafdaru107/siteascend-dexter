<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index()
    {
        $data = [
            'tags' => Tag::all()
        ];

        return view("tag.index", $data);
    }

    public function create()
    {

    return view("tag.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            Tag::create([
                'tag_name' => $request->name,
            ]);
    
            return redirect()->back()->with('success', 'New Tag created successfully!');
    }

    public function edit(Tag $tag)
    {
        $data = [
            'tag' => $tag
        ];

        return view("tag.edit", $data);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            $tag->update([
                'tag_name' => $request->name
            ]);

            return redirect()->route('admin.tag.index')->with('success', 'Tag Updated successfully!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with('success', "Tag deleted successfully!");
    }

    public function addStatusToContact(Request $request)
    {
        DB::beginTransaction();
        try {
           
            $tag = Tag::find($request->tagId);

            $tag->contacts()->syncWithoutDetaching($request->contactIds);
    
            DB::commit();
    
            return response()->json(['status'=>'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status'=>'error'], 500);
        }
    }

    public function addStatusToCompany(Request $request)
    {
        DB::beginTransaction();
        try {
           
            $tag = Tag::find($request->tagId);

            $tag->companies()->syncWithoutDetaching($request->companyIds);
    
            DB::commit();
    
            return response()->json(['status'=>'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status'=>'error'], 500);
        }
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
}
