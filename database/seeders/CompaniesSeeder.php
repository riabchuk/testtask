<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'ТОВ Українська енергетична біржа',
                'edrpou' => '37027819',
                'address' => '01001, Україна, м. Київ, вул. Хрещатик, 44',
            ]
        );
    }
}
