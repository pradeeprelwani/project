<?php

use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Hobby::class, 10)->create()->each(function($hobby) {
            $hobby->save();
        });
    }

}
