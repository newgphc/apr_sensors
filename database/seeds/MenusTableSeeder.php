<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $m1 = factory(Menu::class)->create([
            'name' => 'Home',
            'url' => '/',
            'icon_class' => 'fa fa-dashboard',
            'parent' => 0,
            'order' => 0,
            'permission' => 'view_home'
        ]);
        $m2 = factory(Menu::class)->create([
            'name' => 'Áreas Monitoreo',
            'url' => 'places',
            'icon_class' => 'fa fa-eye',
            'parent' => 0,
            'order' => 1,
            'permission' => 'places'
        ]);

        factory(Menu::class)->create([
            'name' => 'Lista de áreas de Monitoreo',
            'url' => 'places',
            'icon_class' => 'fa fa-list',
            'parent' =>$m2->id,
            'order' => 0,
            'permission' => 'list_places'
        ]);

        factory(Menu::class)->create([
            'name' => 'Agregar Lugar',
            'url' => 'places/create',
            'icon_class' => '',
            'parent' => $m2->id,
            'order' => 1,
            'permission' => 'create_places'
        ]);

        factory(Menu::class)->create([
            'name' => 'Agregar Sensor',
            'url' => 'sensors/create',
            'icon_class' => '',
            'parent' => $m2->id,
            'order' => 1,
            'permission' => 'create_sensors'
        ]);

        $m3 = factory(Menu::class)->create([
            'name' => 'Alarmas',
            'url' => '',
            'icon_class' => 'fa fa-bell',
            'parent' => 0,
            'order' => 2,
            'permission' => 'alarms'
        ]);

        factory(Menu::class)->create([
            'name' => 'Lista de Alarmas',
            'url' => 'alarms',
            'icon_class' => '',
            'parent' => $m3->id,
            'order' => 0,
            'permission' => 'list_alarms'
        ]);

        factory(Menu::class)->create([
            'name' => 'Agregar Alarma',
            'url' => 'alarms/create',
            'icon_class' => '',
            'parent' => $m3->id,
            'order' => 0,
            'permission' => 'create_alarms'
        ]);

        $m4 = factory(Menu::class)->create([
            'name' => 'Mensajes',
            'url' => 'opcion4',
            'icon_class' => 'fa fa-envelope',
            'parent' => 0,
            'order' => 3,
            'permission' => 'messages'
        ]);

        factory(Menu::class)->create([
            'name' => 'Mensajes recibidos',
            'url' => 'messages',
            'icon_class' => '',
            'parent' => $m4->id,
            'order' => 0,
            'permission' => 'view_messages'
        ]);

        factory(Menu::class)->create([
            'name' => 'Nuevo mensaje',
            'url' => 'messages/create',
            'icon_class' => '',
            'parent' => $m4->id,
            'order' => 1,
            'permission' => 'create_messages'
        ]);

        $m5 = factory(Menu::class)->create([
            'name' => 'Administración',
            'url' => '',
            'icon_class' => 'fa fa-cog',
            'parent' => 0,
            'order' => 4,
            'permission' => 'management'
        ]);

        factory(Menu::class)->create([
            'name' => 'Lista de Usuarios',
            'url' => 'users',
            'icon_class' => 'fa fa-cog',
            'parent' => $m5->id,
            'order' => 0,
            'permission' => 'list_users'
        ]);

        factory(Menu::class)->create([
            'name' => 'Agregar Usuario',
            'url' => 'users',
            'icon_class' => '',
            'parent' => $m5->id,
            'order' => 1,
            'permission' => 'create_users'
        ]);

        $m6 = factory(Menu::class)->create([
            'name' => 'Soporte',
            'url' => '',
            'icon_class' => 'fa fa-question-circle',
            'parent' => 0,
            'order' => 5,
            'permission' => 'support'
        ]);

        $m7 = factory(Menu::class)->create([
            'name' => 'Administracion de Clientes',
            'url' => '',
            'icon_class' => 'fa fa-users',
            'parent' => 0,
            'order' => 6,
            'permission' => 'customers'
        ]);

        factory(Menu::class)->create([
            'name' => 'Lista de Clientes',
            'url' => 'customers',
            'icon_class' => '',
            'parent' => $m7->id,
            'order' => 0,
            'permission' => 'list_customers'
        ]);

        factory(Menu::class)->create([
            'name' => 'Agregar Cliente',
            'url' => 'customers/create',
            'icon_class' => '',
            'parent' => $m7->id,
            'order' => 1,
            'permission' => 'create_customers'
        ]);
    }
}
