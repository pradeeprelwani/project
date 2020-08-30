<?php

use Illuminate\Database\Seeder;
use App\Hobby;

class HobbySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $array = [
            '0' => [
                'name' => 'Reading',
                'status' => 'Active',
            ],
            '1' => [
                'name' => 'Writing',
                'status' => 'Active',
            ],
            '2' => [
                'name' => 'Dancing',
                'status' => 'Active',
            ],
            '3' => [
                'name' => 'Singing',
                'status' => 'Active',
            ],
            '4' => [
                'name' => 'Traveling  ',
                'status' => 'Active',
            ]
            
        ];
        Hobby::insert($array);
    }

}
