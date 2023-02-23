<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\News;
use App\Models\Source;
use App\QueryBuilders\NewsQueryBuilder;
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
       $news = News::all('id');
       $source = Source::all('id');

        for ($i = 1; $i <= $news->count(); $i++){
            $data[] = [
                'source_id' => $source->where(),
                'news_id' => $i,
            ];
        }
        return $data;
    }
}
