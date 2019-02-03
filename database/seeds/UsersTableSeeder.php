<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Max Mustermann',
            'email' => 'max@mustermann.at',
            'password' => Hash::make('muster'),
        ]);
    }
}
