<?php

use Illuminate\Database\Seeder;
use App\Customer;
use App\Place;
use App\Sensor;
use App\MeasurementType;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::where('rut', 	'1-9')->first();

        $place = Place::create([
          'name' => 'Pozo las Acacias',
          'description' => 'las acacias',
          'customer_id' => $customer->id
        ]);

        $medida = MeasurementType::where('name', 'Grados Celcius')->first();

        Sensor:: create([
            'place_id' => $place->id,
            'fisical_sensor_id' => '111A125005000111',
            'description' => 'Sensor de temperatura motor',
            'long_description' => '',
            'active' => true,
            'refresh_interval' => 1000,
            'measurement_type_id' => $medida->id,
            'h' => '0',
            'r' => '0',
            'distance' => '0'
        ]);

        $place = Place::create([
          'name' => 'Pozo Champa',
          'description' => 'champa',
          'customer_id' => $customer->id
        ]);

        $medida = MeasurementType::where('name', 'Litros')->first();

        Sensor:: create([
            'place_id' => $place->id,
            'fisical_sensor_id' => '222A126005000222',
            'description' => 'Sensor de Nivel Pozo',
            'long_description' => '',
            'active' => true,
            'refresh_interval' => 1000,
            'measurement_type_id' => $medida->id,
            'h' => '0',
            'r' => '0',
            'distance' => '0'
        ]);

        Place::create([
          'name' => 'Pozo Hospital',
          'description' => 'hospital',
          'customer_id' => $customer->id
        ]);

    }
}
