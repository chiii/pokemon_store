<?php

use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pokemon')->insert([
           'pokemon_name'=>'ナエトル',
            'pokemon_detail'=>'つちで できた せなかの こうらは みずを のむと さらに かたくなる。 みずうみの ほとりで くらしている。',
            'pokemon_price'=>'3000000',
            'pokemon_imgpath'=>'images/naetoru.png',
        ]);

        DB::table('pokemon')->insert([
            'pokemon_name'=>'ハヤシガメ',
            'pokemon_detail'=>'もりの なかの みずべで くらす。 ひるまは もりの そとに でて こうらの きに ひかりを あてる。',
            'pokemon_price'=>'30000000',
            'pokemon_imgpath'=>'images/hayasigame.png',
        ]);

        DB::table('pokemon')->insert([
            'pokemon_name'=>'ドダイトス',
            'pokemon_detail'=>'ちいさな ポケモンたちが あつまり うごかない ドダイトスの せなかで すづくりを はじめることがある。',
            'pokemon_price'=>'300000000',
            'pokemon_imgpath'=>'images/dodaitosu.png',
        ]);
    }
}
