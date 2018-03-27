<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
          'name' => 'view_home'
        ]);

        Permission::create([
          'name' => 'sensors'
        ]);

        Permission::create([
          'name' => 'places'
        ]);

        Permission::create([
          'name' => 'alarms'
        ]);
        /*Customers module permissions*/
        Permission::create([
          'name' => 'customers'
        ]);

        Permission::create([
          'name' => 'support'
        ]);

        Permission::create([
          'name' => 'messages'
        ]);

        Permission::create([
          'name' => 'view_messages'
        ]);

        Permission::create([
          'name' => 'create_messages'
        ]);

        Permission::create([
          'name' => 'management'
        ]);

        Permission::create([
          'name' => 'list_customers'
        ]);
        Permission::create([
          'name' => 'view_customers'
        ]);
        Permission::create([
          'name' => 'create_customers'
        ]);

        Permission::create([
          'name' => 'edit_customers'
        ]);

        Permission::create([
          'name' => 'delete_customers'
        ]);

        /*Places module permissions*/
        Permission::create([
          'name' => 'list_places'
        ]);

        Permission::create([
          'name' => 'view_places'
        ]);

        Permission::create([
          'name' => 'create_places'
        ]);

        Permission::create([
          'name' => 'edit_places'
        ]);

        Permission::create([
          'name' => 'delete_places'
        ]);

        /*Sensors module permissions*/
        Permission::create([
          'name' => 'list_sensors',
        ]);

        Permission::create([
          'name' => 'view_sensors',
        ]);

        Permission::create([
          'name' => 'create_sensors',
        ]);

        Permission::create([
          'name' => 'edit_sensors'
        ]);

        Permission::create([
          'name' => 'delete_sensors'
        ]);

        /*Alarms module permissions*/
        Permission::create([
          'name' => 'list_alarms'
        ]);

        Permission::create([
          'name' => 'view_alarms'
        ]);

        Permission::create([
          'name' => 'create_alarms'
        ]);

        Permission::create([
          'name' => 'edit_alarms'
        ]);

        Permission::create([
          'name' => 'delete_alarms'
        ]);

        /*Alarms module permissions*/
        Permission::create([
          'name' => 'list_users'
        ]);

        Permission::create([
          'name' => 'view_users'
        ]);

        Permission::create([
          'name' => 'create_users'
        ]);

        Permission::create([
          'name' => 'edit_users'
        ]);

        Permission::create([
          'name' => 'delete_users'
        ]);

        /*Config module permissions*/
        Permission::create([
          'name' => 'set_config'
        ]);
    }
}
