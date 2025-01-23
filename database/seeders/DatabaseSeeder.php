<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\GamePlayerFactory;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'permissions' => [
                "platform.index" => true,
                "platform.systems.roles" => true,
                "platform.systems.users" => true,
                "platform.systems.attachment" => true
            ]
        ]);
        GamePlayerFactory::times(10)->create();
    }
}
