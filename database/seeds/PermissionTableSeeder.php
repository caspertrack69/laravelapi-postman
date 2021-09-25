<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions=[
            'role-list',
            'role-edit',
            'role-create',
            'role-delete',
            'user-list',
            'user-edit',
            'user-create',
            'user-delete',
            'tugas-list',
            'tugas-edit',
            'tugas-create',
            'tugas-delete',
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
    }
}
