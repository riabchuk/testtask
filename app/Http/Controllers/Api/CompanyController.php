<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\CompanyVersion;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    public function create(CompanyRequest $request)
    {
        $result = CompanyService::create($request->validated());
        return response()->json($result);
    }

    public function versions($edrpou)
    {
        $company = Company::where('edrpou', $edrpou)->first();
        if (!$company) {
            return response()->json([
                'message' => 'Company not found',
                'status' => 'error'
            ], 404);
        }
        $companyHistory = CompanyVersion::where('company_id', $company->id)->get();
        return CompanyResource::collection($companyHistory);
    }
}
