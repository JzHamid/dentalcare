<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'fname' => 'Jazhem',
            'lname' => 'Hamid',
            'email' => 'hamid1@gmail.com',
            'phone' => '09458170017',
            'address' => 'Ipil',
            'gender' => 0,
            'birthdate' => '2003-07-14 00:00:00',
            'status' => 3
        ]);
    }
}
