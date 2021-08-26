<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompanyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $company = Company::where('name', '=', $row['company_name'])->first();
        if ($company !== null) {
            // Company already exists
            return null;
        }

        return new Company([
            'name' => $row['company_name'],
            'street_address' => $row['company_street_address'],
            'city' => $row['company_city'],
            'state' => $row['company_state'],
            'zip' => $row['company_zip_code'],
            'country' => $row['company_country'],
            'hq_phone' => $row['company_hq_phone'],
            'ticker' => $row['ticker'] ?? null,
            'revenue' => $row['revenue_in_000s'] ?? null,
            'revenue_range' => $row['revenue_range'] ?? null,
            'marketing_dept_budget' => $row['est_marketing_department_budget_in_000s'] ?? null,
            'finance_dept_budget' => $row['est_finance_department_budget_in_000s'] ?? null,
            'it_dept_budget' => $row['est_it_department_budget_in_000s'] ?? null,
            'hr_dept_budget' => $row['est_hr_department_budget_in_000s'] ?? null,
            'employees' => $row['employees'],
            'employees_range' => $row['employee_range'],
            'primary_industry' => $row['primary_industry'],
            'primary_sub_industry' => $row['primary_sub_industry'] ?? null,
            'all_industries' => $row['all_industries'],
            'all_sub_industries' => $row['all_sub_industries'] ?? null,
            'zoominfo_company_profile_url' => $row['zoominfo_company_profile_url'],
            'linkedin_company_profile_url' => $row['linkedin_company_profile_url'],
            'ownership_type' => $row['ownership_type'],
            'business_model' => $row['business_model'] ?? null,
        ]);
    }
}
