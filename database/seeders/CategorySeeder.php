<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData():array
    {

        $data = [];
        for ($i = 1; $i <= 5; $i++){
            $data[] = [
                'id'=> $i,
                'title'=> \fake()->jobTitle(),
                'description'=>\fake()->text(50),
                'created_at'=> \now()
            ];
        }
        return $data;
    }
}
