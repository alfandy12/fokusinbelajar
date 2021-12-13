<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tambahin seeder
        DB::table('users')->insert([
            'name' => 'admin',
            'level' => 'admin',
            'email' => 'admin@fokusinbelajar.ga',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => hash::make('admin123'),
            'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'level' => 'user',
            'email' => 'user@fokusinbelajar.ga',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => hash::make('user1234'),
            'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
