<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        return view("auth/login");
    }

    public function adminDashboard(Request $request)
    {
        dd(Role::withCount(['users'])->get());
        $data = [
            'stats' => ['totalCampaigns' => 29, 'totalCompanies' => 220, 'totalAdmins' => 1, 'totalDGRUsers' => User::all()->count()]
        ];
        return view("admin/dashboard", $data);
    }

    public function dgrDashboard(Request $request)
    {
        return view("dgr/dashboard");
    }
}
