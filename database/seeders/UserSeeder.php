<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //The criteria of the seeding data
        User::create([
            'name'=>'abdelrhman',
            'email'=>'abdelrhman@gmail.com',
            'password'=>Hash::make('07775000'),
            'phone_number'=>'2244607754',
        ]); // Seeder by model
//        DB::table('users')->insert([
//            'name'=>'abdelrhman',
//            'email'=>'abdelrhman@gmail.com',
//            'password'=>Hash::make('07775000'),
//            'phone_number'=>'2244607754',
//        ]); // Seeder by model
        DB::table('users')->insert([
            'name'=>'ahmed',
            'email'=>'ahmed@gmail.com',
            'password'=>Hash::make('147852369'),
            'phone_number'=>'0216359521',
        ]); // Seeder by Database
        // observation timestamp here is null but in the seeder model is automatically fill timestamp
    }
}
