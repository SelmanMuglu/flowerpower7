<?php

use Illuminate\Database\Seeder;
use App\Artikel;
use Illuminate\Support\Facades\DB;

class ArtikelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikels')->truncate();
        DB::table('artikels')->insert([
            [
                'artikel'=> 'rozen',
                'prijs' => '29'
            ],[
                'artikel'=> 'tulpen',
                'prijs' => '39.99'
            ], [
                'artikel'=> 'zonnebloem',
                'prijs' => '10.95'
            ], [
                'artikel'=> 'bieslook',
                'prijs' => '20.95'
            ],
        ]);
    }
}
