<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin',
            'cnic'=>'35202-5968523-3',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'first_name' => 'ahsan',
            'cnic'=>'00000-0000000-0',
            'email' => 'ahsanalamgir14@gmail.com',
            'password' => Hash::make('ilamdin007'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'first_name' => 'Alamgir',
            'cnic'=>'00000-0000000-0',
            'email' => 'alamgiradil14@gmail.com',
            'password' => Hash::make('alamgiradil'),
            'role' => 'admin',
        ]);
    }
}
