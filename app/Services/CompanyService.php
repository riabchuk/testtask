<?php

namespace App\Services;

use App\Models\Companies;
use App\Models\Company;
use App\Models\CompanyVersion;

class CompanyService
{
    public static function create($data)
    {
        $company = Company::where('edrpou', $data['edrpou'])->first();
        if (!$company) {
            $company = new Company();
            $company->name = $data['name'];
            $company->edrpou = $data['edrpou'];
            $company->address = $data['address'];
            $company->save();
            $history = self::createVersion($company->id,$data['name'],$data['address']);
            return
                [
                    'status'=>'created',
                    'version'=> $history->version,
                    'company_id'=> $company->id,
                ];
        } else {
            if ($company->name !== $data['name'] || $company->address !== $data['address']) {
                $company->name = $data['name'];
                $company->address = $data['address'];
                $company->save();
                $history = self::createVersion($company->id,$data['name'],$data['address']);
                return
                    [
                        'status'=>'updated',
                        'version'=> $history->version,
                        'company_id'=> $company->id,
                    ];
            }
            return [
                'status'=>'duplicate',
                ];
        }
    }

    public static function createVersion($companyId,$name,$address): CompanyVersion
    {
        $lastCompanyVersion = CompanyVersion::where('company_id',$companyId)->latest()->first();
        if ($lastCompanyVersion) {
            $version = $lastCompanyVersion->version + 1;
        } else {
            $version = 1;
        }
        $companyVersion = new CompanyVersion();
        $companyVersion->company_id = $companyId;
        $companyVersion->name = $name;
        $companyVersion->address = $address;
        $companyVersion->version = $version;
        $companyVersion->save();
        return $companyVersion;

    }
}
