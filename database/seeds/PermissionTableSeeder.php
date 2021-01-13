<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }


        // add user role and create an user
			Role::create(['name' => 'user']);
			$user = factory(\App\User::class)->create();
			$user->assignRole('user');
        // add user role and create an user



        // add Admin role and create an user
	        $role = Role::create(['name' => 'admin']);
			$role->givePermissionTo( $permissions ); // add all permissions to admin

		    $admin = factory(\App\User::class)->create([
		        'name' => 'Akshita Manglik',
		        'email' => 'mmakshita2398@gmail.com',
		        'password' => bcrypt('12345678'),
		    ]);

		    $admin->assignRole('admin');


        // add Admin role and create an user


    }
}
