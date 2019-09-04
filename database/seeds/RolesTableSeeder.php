<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $admin_role = Role::firstOrNew(['name' => 'admin']);
        $user_role = Role::firstOrNew(['name' => 'user']);
        $driver_role = Role::firstOrNew(['name' => 'driver']);
        $staff_role = Role::firstOrNew(['name' => 'staff']);

        if (!$admin_role->exists) {
            $admin_role->fill([
                    'display_name' => __('voyager::seeders.roles.admin'),
                ])->save();
        }

        if (!$user_role->exists) {
            $user_role->fill([
                    'display_name' => __('voyager::seeders.roles.user'),
                ])->save();
        }
        
        if (!$driver_role->exists) {
            $driver_role->fill([
                    'display_name' => __('Driver'),
                ])->save();
        }

        if (!$staff_role->exists) {
            $staff_role->fill([
                    'display_name' => __('Staff'),
                ])->save();
        }

    }
}
