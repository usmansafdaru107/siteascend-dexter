<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactTagController extends Controller
{
    public function index()
    {
        $data = [
            'tags' => Tag::withCount(['contacts'])->where('tag_category_id', Tag::CONTACT)->get()
        ];

        return view("contact_tag.index", $data);
    }

    public function create()
    {
        return view("contact_tag.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        Tag::create([
            'tag_name' => $request->name,
            'tag_category_id' => 1
        ]);

        return redirect()->back()->with('success', 'New Contact Tag created successfully!');
    }

    public function edit(Tag $contact_tag)
    {
        $data = [
            'tag' => $contact_tag
        ];
        return view("contact_tag.edit", $data);
    }

    public function update(Request $request, Tag $contact_tag)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
            $contact_tag->update([
                'tag_name' => $request->name
            ]);

            return redirect()->route('admin.contact.tag.index')->with('success', 'Contact Tag Updated successfully!');
    }

    public function destroy(Tag $contact_tag)
    {
        $contact_tag->delete();
        return redirect()->back()->with('success', "Contact Tag deleted successfully!");
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

    public function tagContacts(Tag $tag)
    {
        $data = [
            'tag' => $tag,
            'contacts' => $tag->contacts
        ];

        return view('contact_tag.tag_contacts', $data);
    }
}
