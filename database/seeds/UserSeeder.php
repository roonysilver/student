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
        DB::table('users')->insert([
            'name'     => 'Tran Cong Son',
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
