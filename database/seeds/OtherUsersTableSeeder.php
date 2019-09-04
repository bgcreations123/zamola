<?php

use Illuminate\Database\Seeder;
use App\{User, Role};

class OtherUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'avatar'         => 'users/default.png',
            ]
        );

        $staff = User::create(
            [ 
                'name'           => 'Staff',
                'email'          => 'staff@staff.com',
                'password'       => bcrypt('admin'),
                'remember_token' => Str::random(60),
                'role_id'        => $staff_role->id,
                'avatar'         => 'users/default.png',
            ]
        );

        $driver = User::create(
            [ 
                'name'           => 'Driver',
                'email'          => 'driver@driver.com',
                'password'       => bcrypt('driver'),
                'remember_token' => Str::random(60),
                'role_id'        => $driver_role->id,
                'avatar'         => 'users/default.png',
            ]
        );

        $user = User::create(
            [ 
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => bcrypt('user'),
                'remember_token' => Str::random(60),
                'role_id'        => $user_role->id,
                'avatar'         => 'users/default.png',
            ]
        );

        $admin->roles()->attach($admin_role);
        $driver->roles()->attach($driver_role);
        $staff->roles()->attach($staff_role);
        $user->roles()->attach($user_role);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
