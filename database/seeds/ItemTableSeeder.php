<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            'name' => 'ニット',
            'price' => '5,000',
            'path' => 'https://publicdomainq.net/images/201805/01s/publicdomainq-0021600pkc.jpg',
            'text' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',

        ];
        DB::table('items')->insert($param);
    }
}
