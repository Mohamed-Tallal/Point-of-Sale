<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Tallal',
            'email' => 'admin@app.com',
            'password' => bcrypt('123456789'),
        ]);

        $user->attachRole('super_admin');
    }
}
