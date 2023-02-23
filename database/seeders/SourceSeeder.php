<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData():array
    {
        $data = [];
        $urls = [
            'https://news.rambler.ru/rss/technology',
            'https://news.rambler.ru/rss/holiday',
            'https://news.rambler.ru/rss/gifts',
            'https://news.rambler.ru/rss/novyy-god-2023',
            'https://news.rambler.ru/rss/world',
            'https://news.rambler.ru/rss/moscow_city',
            'https://news.rambler.ru/rss/tech',
            'https://news.rambler.ru/rss/games'

        ];
        for ($i = 1; $i <= array_key_last($urls); $i++){
            $name = explode( '/', $urls[$i]);
            $data[] = [
                'id'=> $i,
                'name'=> end($name),
                'path' =>  $urls[$i],
                'created_at'=> \now()
            ];
        }
        return $data;
    }
}
