<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Sources;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('category_has_news')->insert($this->getData());
    }

    private function getData():array
    {
        $newsCount =  News::all('id')->count();
        $categoryId = Category::all('id')->count();
        $data = [];
        for ($i = 1; $i <= $newsCount; $i++){
            $data[] = [
                'category_id' => \fake()->numberBetween(1, $categoryId),
                'news_id' =>$i,
            ];
        }
        return $data;
    }
}
