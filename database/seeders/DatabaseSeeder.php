<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin123',
            'password' => Hash::make('admin123'),
            'level' => 'admin',
        ]);

        User::create([
            'email' => 'operator@operator123',
            'password' => Hash::make('operator123'),
            'level' => 'operator',
        ]);

        // \App\Models\User::factory(10)->create();

    }
}
