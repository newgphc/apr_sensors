<?php

use Illuminate\Database\Seeder;

class CapturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Capture::class, 600)->create();        
    }
}
