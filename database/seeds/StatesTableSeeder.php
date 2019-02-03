<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ID 1
        DB::table('states')->insert([
            'state' => 'Wien',
        ]);
        //ID 2
        DB::table('states')->insert([
            'state' => 'Niederösterreich',
        ]);
        //ID 3
        DB::table('states')->insert([
            'state' => 'Oberösterreich',
        ]);
        //ID 4
        DB::table('states')->insert([
            'state' => 'Salzburg',
        ]);
        //ID 5
        DB::table('states')->insert([
            'state' => 'Tirol',
        ]);
        //ID 6
        DB::table('states')->insert([
            'state' => 'Vorarlberg',
        ]);
        //ID 7
        DB::table('states')->insert([
            'state' => 'Burgenland',
        ]);
        //ID 8
        DB::table('states')->insert([
            'state' => 'Steiermark',
        ]);
        //ID 9
        DB::table('states')->insert([
            'state' => 'Kärnten',
        ]);
    }
}
