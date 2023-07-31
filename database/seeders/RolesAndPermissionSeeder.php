<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1= User::create([
            'name' => 'admin',
            'email' => 'lauros@gmail.com',
            'password' => bcrypt('spacebar123'), // password
        ]);

        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'create-client']);
        Permission::create(['name' => 'view-client']);
        Permission::create(['name' => 'edit-client']);
        Permission::create(['name' => 'delete-client']);

        $admin->givePermissionTo(Permission::all());
        $editor->givePermissionTo(['create-client', 'view-client', 'edit-client']);
        $user->givePermissionTo(['view-client']);

        $user1->assignRole('admin');
    }
}
