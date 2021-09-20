<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index() 
    {
        $data = [
            'contactRequests' => ContactRequest::all()
        ];

        return view("contact.create_requests", $data);
    }

    public function store(Request $request)
    {
        try {
            ContactRequest::create([
                'company_name' => $request->companyName,
                'prospect_title' => $request->prospectTitle,
                'requested_by' => auth()->user()->id,
            ]);
            return response()->json(["status" => "success"]);
        } catch (\Throwable $th) {
            return response()->json(["status" => "error"], 500);
        }
    }

    public function destroy(ContactRequest $contactRequest) 
    {
        $contactRequest->delete();
        return redirect()->back()->with('success', "Request marked as resolved!");
    }
}
