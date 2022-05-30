<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name' => 'guru',
                'email' => 'guru@contoh.com',
                'role' => 'guru',
                'password' => Hash::make('12344321'),
                'created_at' => now(),
                'updated_at' => now()
        ]);
        User::create([
                'name' => 'kurikulum',
                'email' => 'kurikulum@contoh.com',
                'role' => 'kurikulum',
                'password' => Hash::make('12344321'),
                'created_at' => now(),
                'updated_at' => now()
        ]);
        User::create([
                'name' => 'kepsek',
                'email' => 'kepsek@contoh.com',
                'role' => 'kepsek',
                'password' => Hash::make('12344321'),
                'created_at' => now(),
                'updated_at' => now()
        ]);
    }
}
