<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CompanyImport;

class CompanyController extends Controller
{
    public function index()
    {
        $data = [
            'companies' => Company::all(),
            'tags' => Tag::where('tag_category_id', 2)->get()
        ];
        return view("company.index", $data);
    }

    public function create()
    {
        $data = [
            'contacts' => Contact::with('company')->get()
        ];

        // dd($data);
        return view("company.create", $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $company = Company::create([
                'name' => $request->companyName,
                'website' => $request->website,
                'street_address' => $request->streetAddress,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'hq_phone' => $request->hq_phone,
                'ticker' => $request->ticker,
                'revenue' => $request->revenue,
                'revenue_range' => $request->revenueRange,
                'marketing_dept_budget' => $request->estMarketingDeptBudget,
                'finance_dept_budget' => $request->estFinanceDeptBudget,
                'it_dept_budget' => $request->estItDeptBudget,
                'hr_dept_budget' => $request->estHrDeptBudget,
                'employees' => $request->employees,
                'employees_range' => $request->employeeRange,
                'primary_industry' => $request->primaryIndustry,
                'primary_sub_industry' => $request->primarySubIndustry,
                'all_industries' => $request->allIndustry,
                'all_sub_industries' => $request->allSubIndustry,
                'zoominfo_company_profile_url' => $request->zoominfoCompanyProfileURL,
                'linkedin_company_profile_url' => $request->linkedinCompanyProfileURL,
                'ownership_type' => $request->ownershipType,
                'business_model' => $request->businessModel,
            ]);
    
            foreach ($request->contacts as $key => $value) {
                Contact::find($value)->update([
                    "company_id" => $company->id
                ]);
            }
            DB::commit();
    
            return redirect()->back()->with('success', 'New Company created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return view("errors.500");
        }
        
    }

    public function edit(Company $company)
    {
        $data = [
            'contacts' => Contact::all(),
            'company' => $company
        ];

        return view("company.edit", $data);
    }

    public function update(Request $request, Company $company)
    {
        DB::beginTransaction();
        try {
            $company->update([
                'name' => $request->companyName,
                'website' => $request->website,
                'street_address' => $request->streetAddress,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'hq_phone' => $request->hq_phone,
                'ticker' => $request->ticker,
                'revenue' => $request->revenue,
                'revenue_range' => $request->revenueRange,
                'marketing_dept_budget' => $request->estMarketingDeptBudget,
                'finance_dept_budget' => $request->estFinanceDeptBudget,
                'it_dept_budget' => $request->estItDeptBudget,
                'hr_dept_budget' => $request->estHrDeptBudget,
                'employees' => $request->employees,
                'employees_range' => $request->employeeRange,
                'primary_industry' => $request->primaryIndustry,
                'primary_sub_industry' => $request->primarySubIndustry,
                'all_industries' => $request->allIndustry,
                'all_sub_industries' => $request->allSubIndustry,
                'zoominfo_company_profile_url' => $request->zoominfoCompanyProfileURL,
                'linkedin_company_profile_url' => $request->linkedinCompanyProfileURL,
                'ownership_type' => $request->ownershipType,
                'business_model' => $request->businessModel,
            ]);

            if($request->contacts !== null) {
                foreach ($request->contacts as $key => $value) {
                    Contact::find($value)->update([
                        "company_id" => $company->id
                    ]);
                }
            }
            
            DB::commit();
    
            return redirect()->route("admin.company.index")->with('success', 'Company Updated successfully!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return view("errors.500");
        }
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back()->with('success', 'Company delete successfully!');
    }

    public function bulkUpload()
    {
        return view("company.upload");
    }

    public function upload(Request $request)
    {
        // Validate if csv
        $this->validate($request, array(
            'csv_file'   => 'required|mimes:csv,txt',
          ));

        // Get Headers
        $headings = (new HeadingRowImport)->toArray(request()->file('csv_file'));
        if(!isset($headings[0][0]) || count($headings[0][0]) < 26)
            return redirect()->back()->with('error', 'Invalid file selected!');

        Excel::import(new CompanyImport, request()->file('csv_file'));
        return redirect()->back()->with('success', 'Records uploaded successfully!');
        
    }

    public function accordview()
    {
        $data = [
            'companies' => Company::all()
        ];
        return view("company.accord", $data);
    }
}
