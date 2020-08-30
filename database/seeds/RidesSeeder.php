<?php

use Illuminate\Database\Seeder;

class RidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Rides::class, 30)->create()->each(function($rider) {
            
               $rider->save();
        });
    }
}
