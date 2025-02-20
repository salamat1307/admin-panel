<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['admin','user'] as $role) {
            Role::updateOrCreate([
                'code' => $role
            ],[
                'name' => strtoupper($role)
            ]);
        }
    }
}
