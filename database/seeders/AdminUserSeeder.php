<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or update admin user
        User::updateOrCreate(
            ['email' => 'admin@church.com'],
            [
                'name' => 'Church Admin',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@church.com');
        $this->command->info('Password: admin123');
    }
}
