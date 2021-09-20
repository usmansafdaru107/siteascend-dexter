<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactImport;
use App\Models\Company;
use App\Models\ContactRequest;
use App\Models\Note;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'contacts' => Contact::with('company')->get(),
            'tags' => Tag::where('tag_category_id', Tag::CONTACT)->get()

        ];
        return view("contact.index", $data);
    }

    public function create()
    {
        $data = [
            'contacts' => Contact::all()
        ];
        return view("contact.create", $data);
    }

    public function store(Request $request)
    {
        Contact::create([
            'first_name' => $request->contactFirstName,
            'last_name' => $request->contactLastName,
            'middle_name' => $request->middleName,
            'salutation' => $request->salutation,
            'suffix' => $request->suffix,
            'management_level' => $request->managementLevel,
            'department' => $request->department,
            'job_function' => $request->jobFunction,
            'job_title' => $request->jobTitle,
            'direct_phone_number' => $request->directPhoneNumber,
            'dial_extension' => $request->dialExtension,
            'mobile_phone' => $request->mobilePhone,
            'email_address' => $request->emailAddress,
            'supplemental_email' => $request->supplementEmail,
            'aa_email' => $request->aaEmail,
            'zoominfo_contact_profile_url' => $request->zoominfoCompanyProfileURL,
            'linkedin_contact_profile_url' => $request->linkedinCompanyProfileURL,
            'street' => $request->personStreet,
            'city' => $request->personCity,
            'state' => $request->personState,
            'zip' => $request->personZipCode,
            'country' => $request->personCountry,
            'email_domain' => $request->emailDomain,
        ]);
        return redirect()->back()->with('success', 'New contact created successfully!');

    }

    public function edit(Contact $contact)
    {

        $data = [
            'contacts' => Contact::all(),
            'contact' => $contact
        ];

        return view("contact.edit", $data);
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update([
            'first_name' => $request->contactFirstName,
            'last_name' => $request->contactLastName,
            'middle_name' => $request->middleName,
            'salutation' => $request->salutation,
            'suffix' => $request->suffix,
            'management_level' => $request->managementLevel,
            'department' => $request->department,
            'job_function' => $request->jobFunction,
            'job_title' => $request->jobTitle,
            'direct_phone_number' => $request->directPhoneNumber,
            'dial_extension' => $request->dialExtension,
            'mobile_phone' => $request->mobilePhone,
            'email_address' => $request->emailAddress,
            'supplemental_email' => $request->supplementEmail,
            'aa_email' => $request->aaEmail,
            'zoominfo_contact_profile_url' => $request->zoominfoCompanyProfileURL,
            'linkedin_contact_profile_url' => $request->linkedinCompanyProfileURL,
            'street' => $request->personStreet,
            'city' => $request->personCity,
            'state' => $request->personState,
            'zip' => $request->personZipCode,
            'country' => $request->personCountry,
            'email_domain' => $request->emailDomain,
        ]);
        return redirect()->route("admin.contact.index")->with('success', 'Contact Updated successfully!');
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->update([
                "deleted_by" => auth()->user()->id
            ]);
            $contact->delete();
            return response()->json(['status' => "success", "message" => 'Contact delete successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error'], 500);
        }
       
    }

    public function show(Request $request)
    {
        try {
            $contact = Contact::select('id', 'first_name','last_name', 'salutation', 'job_title', 'direct_phone_number', 'dial_extension', 'mobile_phone', 'email_address', 'aa_email', 'zoominfo_contact_profile_url', 'linkedin_contact_profile_url')->where('id', $request->contactId)->get();
            
            if(!$contact)
                return response()->json(["status" => "error" ], 404);

            $note = Note::where("contact_id", "=", $request->contactId)->where("campaign_id", "=", $request->campaignId)->where("company_id", "=", $request->companyId)->get();
            
            if(!$note->isEmpty())
                $contact[0]->notes = $note[0]->notes;
            else
                $contact[0]->notes = "";

            return response()->json(['contact' => $contact[0]]);
        } catch (\Throwable $th) {
            return response()->json(["status" => "error" ], 500);
        }
    }

    public function deleteRequests()
    {
        $data = [
            'contacts' => Contact::onlyTrashed()->with('company')->get()
            // 'user' => User::where('id', '=', 1)->get(["name", "email"])[0]
        ];
        return view("contact.delete_requests", $data);
    }

    public function restore($contactId)
    {
        $contact = Contact::withTrashed()->find($contactId);
        $contact->restore();
        $contact->update([
            'deleted_by' => null
        ]);
        return redirect()->back()->with('success', 'Contact restored successfully!');
    }

    public function miniUpdate(Request $request, Contact $contact)
    {
       try {
            $splitName = explode(' ', $request->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

            $first_name = $splitName[0];
            $last_name = !empty($splitName[1]) ? $splitName[1] : '';
            $contact->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'job_title' => $request->contact_details_title,
                'direct_phone_number' => $request->contact_details_direct_dial,
                'dial_extension' => $request->contact_details_ext,
                'mobile_phone' => $request->contact_details_mobile,
                'email_address' => $request->contact_details_email,
                'aa_email' => $request->contact_details_aa_email,
                'zoominfo_contact_profile_url' => $request->contact_details_zoominfo_profile,
                'linkedin_contact_profile_url' => $request->contact_details_linkedin_profile,
            ]);
            return response()->json(["status" => "success"]);
       } catch (\Throwable $th) {
            return response()->json(["status" => "error"], 500);
       }
    }

    public function miniUpdateNote(Request $request)
    {
       try {
            $note = Note::where("contact_id", "=", $request->contactId)->where("campaign_id", "=", $request->campaignId)->where("company_id", "=", $request->companyId)->get();
            if($note->isEmpty()) {
                Note::create([
                    'campaign_id' => $request->campaignId,
                    'company_id' => $request->companyId,
                    'contact_id' => $request->contactId,
                    'notes' => $request->notes,
                ]);
            } else
                $note[0]->update(['notes' => $request->notes]);
            return response()->json(["status" => "success"]);
       } catch (\Throwable $th) {
            return response()->json(["status" => "error"], 500);
       }
    }

    public function forceDestroy($contactId)
    {
        Contact::withTrashed()->find($contactId)->forceDelete();
        return redirect()->back()->with('success', 'Contact permanently delete!');
        
    }

    public function bulkUpload()
    {
        return view("contact.upload");
    }

    public function upload(Request $request)
    {
        // Validate if csv
        $this->validate($request, array(
            'csv_file'   => 'required|mimes:csv,txt',
        ));

        // Get Headers
        $headings = (new HeadingRowImport)->toArray(request()->file('csv_file'));
        if(!isset($headings[0][0]) || count($headings[0][0]) < 22)
            return redirect()->back()->with('error', 'Invalid file selected!');

        Excel::import(new ContactImport, request()->file('csv_file'));
        return redirect()->back()->with('success', 'Records uploaded successfully!');
    }

    public function storeMini(Request $request)
    {
        try {
            Contact::create([
                'company_id' => $request->companyId,
                'first_name' => $request->contactFirstName,
                'last_name' => $request->contactLastName,
                'salutation' => $request->salutation,
                'job_title' => $request->jobTitle,
                'direct_phone_number' => $request->directPhoneNumber,
                'dial_extension' => $request->dialExtension,
                'mobile_phone' => $request->mobilePhone,
                'email_address' => $request->emailAddress,
                'zoominfo_contact_profile_url' => $request->zoominfoCompanyProfileURL,
                'linkedin_contact_profile_url' => $request->linkedinCompanyProfileURL,
            ]);
            return response()->json(['success' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['success' => 'error'], 500);
        }

    }

    public function storeMiniContact(Request $request)
    {
        try {

            $contactRequest = ContactRequest::where('id', '=', $request->contactRequestId)->get();
            if($contactRequest->isEmpty())
                return response()->json(['status' => 'error', 'type' => 'contact-request-not-found'], 404);
            $contactRequest = $contactRequest[0];

            $company = Company::where('name', '=', $request->companyName)->get("id");
            if($company->isEmpty())
                return response()->json(['status' => 'error', 'type' => 'company-not-found'], 404);
            $company = $company[0];

           

            $splitName = explode(' ', $request->prospectTitle, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

            $first_name = $splitName[0] ?? '';
            $last_name = $splitName[1] ?? '';

            DB::beginTransaction();
            Contact::create([
                'company_id' => $company->id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'salutation' => $request->salutation,
                'job_title' => $request->jobTitle,
                'direct_phone_number' => $request->directPhoneNumber,
                'dial_extension' => $request->dialExtension,
                'mobile_phone' => $request->mobilePhone,
                'email_address' => $request->emailAddress,
                'zoominfo_contact_profile_url' => $request->zoominfoCompanyProfileURL,
                'linkedin_contact_profile_url' => $request->linkedinCompanyProfileURL,
            ]);
            $contactRequest->delete();
            DB::commit();
            return response()->json(['success' => 'success']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error'], 500);
        }

    }
   
}