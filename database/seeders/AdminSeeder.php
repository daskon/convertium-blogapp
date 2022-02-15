<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
      User::create([
            'name' => 'Admin',
            'email' => 'admin@convertium.com',
            'password' => Hash::make('123456789'),
            'level' => '1',
      ]);
      
      User::create([
            'name' => 'Editor',
            'email' => 'editor@convertium.com',
            'password' => Hash::make('123456789'),
            'level' => '3',
      ]);
    }
}
