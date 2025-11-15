<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyVersion;

class MainController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index',
        [
            'companies' => $companies,
        ]);
    }

    public function history($id)
    {
        $company = Company::where(['id'=>$id])->first();
        $companyHistory = CompanyVersion::where('company_id', $id)->get();
        return view('companies.history',[
            'companyHistory' => $companyHistory,
            'company' => $company,
        ]);
    }
}
