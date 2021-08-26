<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            'company_id' => null,
            'first_name' => $row['first_name'] ?? null,
            'last_name' => $row['last_name'] ?? null,
            'middle_name' => $row['middle_name'] ?? null,
            'salutation' => $row['salutation'] ?? null,
            'suffix' => $row['suffix'] ?? null,
            'management_level' => $row['management_level'] ?? null,
            'department' => $row['department'] ?? null,
            'job_function' => $row['job_function'] ?? null,
            'job_title' => $row['job_title'] ?? null,
            'direct_phone_number' => $row['direct_phone_number'] ?? null,
            'mobile_phone' => $row['mobile_phone'] ?? null,
            'email_address' => $row['email_address'] ?? null,
            'supplemental_email' => $row['supplemental_email'] ?? null,
            'zoominfo_contact_profile_url' => $row['zoominfo_contact_profile_url'] ?? null,
            'linkedin_contact_profile_url' => $row['linkedin_contact_profile_url'] ?? null,
            'street' => $row['person_street'] ?? null,
            'city' => $row['person_city'] ?? null,
            'state' => $row['person_state'] ?? null,
            'zip' => $row['person_zip_code'] ?? null,
            'country' => $row['country'] ?? null,
            'email_domain' => $row['email_domain'] ?? null,
        ];
        $company = Company::where('name', '=', $row['company_name'])->first();
        if ($company !== null) {
            // Company exists, now check if record is already added
            $contact = Contact::where('first_name', $row['first_name'])->where('last_name', $row['last_name'])->where('company_id', $company->id)->first();
            if ($contact !== null) {
                // Contact already exists with a company id so don't insert again
                return null;
            }
            $data['company_id'] = $company->id;
        }

        return new Contact($data);
    }
}
