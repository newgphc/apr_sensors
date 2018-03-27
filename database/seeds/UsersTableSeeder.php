<?php

use App\User;
use App\Customer;
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $u = User::create([
          'name' => 'Jose Luis Sanchez Moreno',
          'email' => 'jose.scream17@gmail.com',
          'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
          'customer_id' => 0,
          'role' => 'Super user',
          'level' => 0
        ]);

        $u->assignRole('superuser');

        $customer = Customer::create([
            'rut' => '1-9',
            'name' => 'empresa de pruebas',
            'mail' => 'empresa@example.com',
            'address' => 'Nowhere',
            'contact_name' => 'Carlos Perez',
            'phone_1' => '12345',
            'phone_2' => '54321'
        ]);

        $u = User::create([
          'name' => 'Jose Valenzuela',
          'email' => 'jose@tecnosys.cl',
          'password' => Hash::make('123'),
          'customer_id' => $customer->id,
          'role' => 'Jefe de Operaciones',
          'level' => 0
        ]);

        $u->assignRole('admin');

        $u = User::create([
          'name' => 'Juan Perez',
          'email' => 'j.perez@tecnosys.cl',
          'password' => Hash::make('123'),
          'customer_id' => $customer->id,
          'role' => 'Usuario Comun',
          'level' => 0
        ]);

        $u->assignRole('user');
    }
}
