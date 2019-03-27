<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Company::insert([
            'name' => 'Musterfirma GmbH',
            'email' => 'office@musterfirma.at',
            'password' => Hash::make('muster'),
            'district_id' => 21,
            'street' => 'Musterstraße 1',
            'city' => 'Graz',
            'plz' => 8041,

        ]);
    }
}
