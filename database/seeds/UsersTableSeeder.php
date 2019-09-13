<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            User::truncate();

            $admin_role = Role::where('name', 'admin')->firstOrFail();
            $staff_role = Role::where('name', 'staff')->firstOrFail();
            $driver_role = Role::where('name', 'driver')->firstOrFail();
            $user_role = Role::where('name', 'user')->firstOrFail();

            $admin = User::create(
                [ 
                    'name'           => 'Admin',
                    'email'          => 'admin@admin.com',
                    'password'       => bcrypt('admin'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $admin_role->id,
                    'avatar'         => 'users/admin3.png',
                ]
            );

            $staff = User::create(
                [ 
                    'name'           => 'Staff',
                    'email'          => 'staff@staff.com',
                    'password'       => bcrypt('staff'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $staff_role->id,
                    'avatar'         => 'users/staff3.png',
                ]
            );

            $driver = User::create(
                [ 
                    'name'           => 'Driver',
                    'email'          => 'driver@driver.com',
                    'password'       => bcrypt('driver'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $driver_role->id,
                    'avatar'         => 'users/driver2.png',
                ]
            );

            $user = User::create(
                [ 
                    'name'           => 'User',
                    'email'          => 'user@user.com',
                    'password'       => bcrypt('user'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $user_role->id,
                    'avatar'         => 'users/staff4.png',
                ]
            );

            $admin->roles()->attach($admin_role);
            $driver->roles()->attach($driver_role);
            $staff->roles()->attach($staff_role);
            $user->roles()->attach($user_role);

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        
        // if (User::count() == 0) {
        //     $admin_role = Role::where('name', 'admin')->firstOrFail();
        //     $staff_role = Role::where('name', 'staff')->firstOrFail();
        //     $driver_role = Role::where('name', 'driver')->firstOrFail();
        //     $user_role = Role::where('name', 'user')->firstOrFail();

        //     $users = [
        //         [ 
        //             'name'           => 'Admin',
        //             'email'          => 'admin@admin.com',
        //             'password'       => bcrypt('admin'),
        //             'remember_token' => Str::random(60),
        //             'role_id'        => $admin_role->id,
        //         ],
        //         [
        //             'name'           => 'Staff',
        //             'email'          => 'staff@staff.com',
        //             'password'       => bcrypt('admin'),
        //             'remember_token' => Str::random(60),
        //             'role_id'        => $staff_role->id,
        //         ],
        //         [
        //             'name'           => 'Driver',
        //             'email'          => 'driver@driver.com',
        //             'password'       => bcrypt('driver'),
        //             'remember_token' => Str::random(60),
        //             'role_id'        => $driver_role->id,
        //         ],
        //         [
        //             'name'           => 'User',
        //             'email'          => 'user@user.com',
        //             'password'       => bcrypt('user'),
        //             'remember_token' => Str::random(60),
        //             'role_id'        => $user_role->id,
        //         ],
        //     ];

        //     User::insert($users);

        // }
    }
}
