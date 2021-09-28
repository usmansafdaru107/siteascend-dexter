<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;

class AdvanceSearchController extends Controller
{
    public function index()
    {
        $data = [
            'contactTags' => Tag::where('tag_category_id', Tag::CONTACT)->get(['id', 'tag_name']),
            'companyTags' => Tag::where('tag_category_id', Tag::COMPANY)->get(['id', 'tag_name']),
            'campaignTags' => Tag::where('tag_category_id', Tag::CAMPAIGN)->get(['id', 'tag_name']),
        ];
        return view("search.filter", $data);
    }

    public function filter(Request $request)
    {
        // $requestData = json_decode($request->getContent(), true);
        // dd($request->all());
        $model = User::all();

        return DataTables::of($model)->make(true);
        // return response()->json([
        //     "contacts" => [
        //         ['name' => "Aleem"],
        //         ['name' => "Ahmad"],
        //         ['name' => "Safdar"],
        //         ['name' => "Ali"],
        //     ],
        //     "companies" => [
        //         ['name' => "Aleem"],
        //         ['name' => "Ahmad"],
        //         ['name' => "Safdar"],
        //         ['name' => "Ali"],
        //     ]
        // ]);
    }
}