<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view("auth/login");
    }

    public function adminDashboard(Request $request)
    {
        $data = [
            'stats' => ['totalCampaigns' => Campaign::count('id'), 'totalCompanies' => Company::count('id'), 'totalAdmins' => Role::where("name", "admin")->withCount(['users'])->get()[0]->users_count, 'totalDGRUsers' => Role::where("name", "dgr")->withCount(['users'])->get()[0]->users_count]
        ];
        return view("admin/dashboard", $data);
    }

    public function userDashboard(Request $request)
    {
        return view("user/dashboard");
    }
}
