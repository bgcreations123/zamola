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

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $driverRole = Role::where('name', 'driver')->first();
        $staffRole = Role::where('name', 'staff')->first();

        $admin = User::create([
        	'role_id' => '1',
        	'name' => 'Admin',
        	'email' => 'admin@admin.com',
        	'avatar' => 'users/default.png',
        	'password' => bcrypt('admin'),
        	'remember_token' => Str::random(60),
        ]);
        
        $user = User::create([
        	'role_id' => '2',
        	'name' => 'user',
        	'email' => 'user@user.com',
        	'avatar' => 'users/default.png',
        	'password' => bcrypt('user'),
        	'remember_token' => Str::random(60),
        ]);

        $driver = User::create([
        	'role_id' => '3',
        	'name' => 'Driver',
        	'email' => 'driver@driver.com',
        	'avatar' => 'users/default.png',
        	'password' => bcrypt('driver'),
        	'remember_token' => Str::random(60),
        ]);

        $staff = User::create([
        	'role_id' => '4',
        	'name' => 'staff',
        	'email' => 'staff@staff.com',
        	'avatar' => 'users/default.png',
        	'password' => bcrypt('staff'),
        	'remember_token' => Str::random(60),
        ]);

        $admin->roles()->attach($adminRole);
        $driver->roles()->attach($driverRole);
        $staff->roles()->attach($staffRole);
        $user->roles()->attach($userRole);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
