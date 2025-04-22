<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert([
            ['name' => 'admin', 'description' => 'Administrador do sistema'],
            ['name' => 'editor', 'description' => 'Usuário com permissões de edição'],
            ['name' => 'user', 'description' => 'Usuário comum'],
        ]);
    }
}
