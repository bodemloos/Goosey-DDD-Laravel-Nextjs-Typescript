<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call('Database\Seeders\RolesandpermissionsSeeder');
        $this->command->info('Roles and Permissions table seeded!');

        $this->call('Database\Seeders\UsersSeeder');
        $this->command->info('User table seeded!');
    }
}