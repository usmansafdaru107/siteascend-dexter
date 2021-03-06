<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyTagController extends Controller
{
    public function index()
    {
        $data = [
            'tags' => Tag::where('tag_category_id', 2)->get()
        ];

        return view("company_tag.index", $data);
    }

    public function create()
    {
        return view("company_tag.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            Tag::create([
                'tag_name' => $request->name,
                'tag_category_id' => 2
            ]);
    
            return redirect()->back()->with('success', 'New Company Tag created successfully!');
    }

    public function edit(Tag $tag)
    {
        $data = [
            'tag' => $tag
        ];

        return view("company_tag.edit", $data);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            $tag->update([
                'tag_name' => $request->name
            ]);

            return redirect()->route('admin.company.tag.index')->with('success', 'Company Tag Updated successfully!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with('success', "Company Tag deleted successfully!");
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

    public function tagCompanies(Tag $tag)
    {
        $data = [
            'tag' => $tag,
            'companies' => $tag->companies
        ];

        return view('company_tag.tag_companies', $data);
    }
}
