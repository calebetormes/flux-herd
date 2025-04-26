<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //roda o seeder RolesTableSeeder.php
        $this->call([
            RolesTableSeeder::class,
        ]);

        // Depois: criar os usuários
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'role_id' => 3
        ]);

        // Cria usuário admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => 1, // ID da role 'admin'
        ]);
       

    }
}
