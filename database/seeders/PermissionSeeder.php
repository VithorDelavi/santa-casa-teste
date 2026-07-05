<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        \Spatie\Permission\Models\Permission::create([
            'name' => 'acessar setores hospitalares'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name' => 'acessar especialidades médicas'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name' => 'acessar equipamentos'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name' => 'acessar unidades assistenciais'
        ]);
    }
}
