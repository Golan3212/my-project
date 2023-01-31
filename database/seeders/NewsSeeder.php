<?php
declare(strict_types=1);
namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class  NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData():array
    {
        $data = [];
        $quantityCategoryNews = 10;
        $quantityCategory = DB::table('categories')->max('id');
        for ($i = 1; $i <= $quantityCategory; $i++){
            for ($k = 1; $k <= $quantityCategoryNews; $k++) {
                $data[] =
                    [
                        'category_id' => $i,
                        'source_id' => \fake()->numberBetween(1, 10),
                        'title'=> \fake()->jobTitle(),
                        'author'=> \fake()->userName(),
                        'status'=> NewsStatus::DRAFT->value,
                        'description'=>\fake()->text(150),
                        'created_at'=> \now(),
                        'updated_at'=> \now()
                ];
            }
        }

        return $data;
    }
}
