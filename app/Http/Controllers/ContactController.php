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
