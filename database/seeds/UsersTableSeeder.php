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
            $admin_role = Role::where('name', 'admin')->firstOrFail();
            $staff_role = Role::where('name', 'staff')->firstOrFail();
            $driver_role = Role::where('name', 'driver')->firstOrFail();
            $user_role = Role::where('name', 'user')->firstOrFail();

            $users = [
                [ 
                    'name'           => 'Admin',
                    'email'          => 'admin@admin.com',
                    'password'       => bcrypt('admin'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $admin_role->id,
                ],
                [
                    'name'           => 'Staff',
                    'email'          => 'staff@staff.com',
                    'password'       => bcrypt('admin'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $staff_role->id,
                ],
                [
                    'name'           => 'Driver',
                    'email'          => 'driver@driver.com',
                    'password'       => bcrypt('driver'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $driver_role->id,
                ],
                [
                    'name'           => 'User',
                    'email'          => 'user@user.com',
                    'password'       => bcrypt('user'),
                    'remember_token' => Str::random(60),
                    'role_id'        => $user_role->id,
                ],
            ];

            User::insert($users);

        }
    }
}
