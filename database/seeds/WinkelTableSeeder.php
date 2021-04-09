<?php

use Illuminate\Database\Seeder;

class WinkelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('winkels')->truncate();
        DB::table('winkels')->insert([
            [
                'winkelnaam'=> 'Flowerpower1',
                'adres' => 'The ends',
                'postcode'=> '3110 DE',
                'plaats' => 'Rotterdam',
                'telefoonnummer' => '0615241225'
            ],[
                'winkelnaam'=> 'Flowerpower2',
                'adres' => 'grovestreet',
                'postcode'=> '6090 QO',
                'plaats' => 'Amsterdam',
                'telefoonnummer' => '0651582369'
            ], [
                'winkelnaam'=> 'Flowerpower3',
                'adres' => 'sesamstraat',
                'postcode'=> 'rozen',
                'plaats' => 'Den Haag',
                'telefoonnummer' => '0699852361'
            ],
        ]);
    }
}
