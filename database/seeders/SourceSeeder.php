<?php
declare(strict_types=1);
namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for ($i = 1; $i <= 10; $i++){
            $data[] = [
                'id'=> $i,
                'category'=> \fake()->jobTitle(),
                'news'=> \fake()->jobTitle(),
                'source'=>\fake()->jobTitle(),
                'path' => \fake()->filePath(),
                'created_at'=> \now()
            ];
        }
        return $data;
    }
}
