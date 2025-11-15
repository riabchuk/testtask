<?php

namespace Database\Seeders;

use App\Models\CompanyVersion;
use Illuminate\Database\Seeder;

class CompanyVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyVersion::updateOrCreate(
            ['id'=>1],
            ['company_id' => 1, 'version' => 1,
            'name' => 'ТОВ Українська енергетична біржа v1', 'address' => 'Нова адреса 1']
        );

        CompanyVersion::updateOrCreate(
            ['id'=>2],
            ['company_id' => 1, 'version' => 2,
            'name' => 'ТОВ Українська енергетична біржа v2', 'address' => 'Нова адреса 2']
        );

        CompanyVersion::updateOrCreate(
            ['id'=>3],
            ['company_id' => 1, 'version' => 3,
            'name' => 'ТОВ Українська енергетична біржа v3', 'address' => 'Нова адреса 3']
        );
    }
}
