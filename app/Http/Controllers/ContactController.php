<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactImport;
use App\Models\Tag;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'contacts' => Contact::with('company')->get(),
            'tags' => Tag::where('tag_category_id', 1)->get()

        ];
        return view("contact.index", $data);
    }

    public function fetchOne($contactId)
    {
        $contact = Contact::select('id', 'first_name','last_name', 'salutation', 'job_title', 'direct_phone_number', 'dial_extension', 'mobile_phone', 'email_address', 'supplemental_email', 'zoominfo_contact_profile_url', 'linkedin_contact_profile_url', 'notes')->where('id', $contactId)->get();
        if(!$contact)
            return response()->json(["status" => "error" ], 404);
        return response()->json(['contact' => $contact[0]]);
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
                'supplemental_email' => $request->contact_details_aa_email,
                'zoominfo_contact_profile_url' => $request->contact_details_zoominfo_profile,
                'linkedin_contact_profile_url' => $request->contact_details_linkedin_profile,
                'notes' => $request->notes,
            ]);
            return response()->json(["status" => "success"]);
       } catch (\Throwable $th) {
            return response()->json(["status" => "error"], 500);
       }
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'Contact delete successfully!');
        
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
        // dd($headings[0][0]);
        if(!isset($headings[0][0]) || count($headings[0][0]) < 22)
            return redirect()->back()->with('error', 'Invalid file selected!');

        Excel::import(new ContactImport, request()->file('csv_file'));
        return redirect()->back()->with('success', 'Records uploaded successfully!');
    }
}
