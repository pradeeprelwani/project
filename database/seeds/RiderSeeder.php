<?php

use Illuminate\Database\Seeder;

class RiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Rider::class, 30)->create()->each(function($rider) {
            
               $rider->save();
        });
    }
}
