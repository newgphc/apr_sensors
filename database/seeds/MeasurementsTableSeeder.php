<?php

use Illuminate\Database\Seeder;
use App\MeasurementUnit;
use App\MeasurementType;

class MeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $msu1 = MeasurementUnit::create([
          'name' => 'Peso'
        ]);

        $msu2 = MeasurementUnit::create([
          'name' => 'Volumen'
        ]);

        $msu3 = MeasurementUnit::create([
          'name' => 'Temperatura'
        ]);

        MeasurementType::create([
          'name' => 'Litros',
          'measurement_unit_id' => $msu2->id
        ]);

        MeasurementType::create([
          'name' => 'Kilogramos',
          'measurement_unit_id' => $msu1->id
        ]);

        MeasurementType::create([
          'name' => 'Grados Celcius',
          'measurement_unit_id' => $msu3->id
        ]);
    }
}
