<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'username' => 'websolutionstuff',
        //     'email' => 'test@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);

        $user = User::find(1);

        $role = Role::firstOrCreate(['name' => 'admin'], []);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
