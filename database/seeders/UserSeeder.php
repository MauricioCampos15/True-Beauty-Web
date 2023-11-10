<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nicole',
            'email' => 'nicolvanessa42@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Admin');

        User::factory(50)->create();
    }
}
