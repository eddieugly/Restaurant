<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);

        $roleUser = Role::create(['name' => 'user']);

        $admin = User::create([
            'name' => 'John Doe',
            'email' => 'doe@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'name' => 'David Mold',
            'email' => 'david@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $admin->assignRole($roleAdmin);
        $user->assignRole($roleUser);

    }
}
