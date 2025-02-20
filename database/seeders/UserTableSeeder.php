<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([
            'email' => 'admin@test.com'
        ],[
            'name' => 'Admin',
            'password' => bcrypt('Password321'),
            'email_verified_at' => now()
        ]);
        $role = Role::where('code', 'admin')->first();
        $user->roles()->attach($role->id);
    }
}
