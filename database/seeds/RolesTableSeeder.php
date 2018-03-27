<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperuser = Role::create(['name' => 'superuser']);

        $roleSuperuser->givePermissionTo(
          'view_home',
          'customers',
          'list_customers',
          'view_customers',
          'create_customers',
          'edit_customers',
          'delete_customers');

        $roleAdmin = Role::create(['name' => 'admin']);

        $roleAdmin->givePermissionTo(
          'view_home',
          'places',
          'sensors',
          'alarms',
          'messages',
          'support',
          'management',
          'list_places',
          'view_places',
          'create_places',
          'edit_places',
          'delete_places',
          'list_sensors',
          'view_sensors',
          'create_sensors',
          'edit_sensors',
          'delete_sensors',
          'list_alarms',
          'view_alarms',
          'create_alarms',
          'edit_alarms',
          'delete_alarms',
          'set_config'
        );

        $roleUser = Role::create(['name' => 'user']);

        $roleUser->givePermissionTo(
          'view_home',
          'places',
          'sensors',
          'alarms',
          'messages',
          'support',
          'list_places',
          'view_places',
          'list_sensors',
          'view_sensors',
          'list_alarms',
          'view_alarms',
          'create_alarms',
          'edit_alarms',
          'delete_alarms'
        );
    }
}
