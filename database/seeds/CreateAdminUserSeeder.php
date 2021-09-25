<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=User::create([
            'name'=>'Wildan',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $role=Role::create(['name'=>'admin']);
        $permissions=Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
