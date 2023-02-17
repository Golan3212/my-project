<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\News;
use App\Models\Source;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('source_has_news')->insert($this->getData());
    }

    private function getData():array
    {
        $newsCount =  News::all('id')->count();
        $sourceId = Source::all('id')->count();
        $data = [];
        for ($i = 1; $i <= $newsCount; $i++){
            $data[] = [
                'source_id' => \fake()->numberBetween(1, $sourceId),
                'news_id' =>$i,
            ];
        }
        return $data;
    }
}
