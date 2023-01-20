<?php
declare(strict_types=1);
namespace App\Http\Controllers;

trait NewsTrait
{


    public function getNews(int $id = null){
        $news = [];
        $quantityNews = 4;
        if($id === null){
            for ($i=1; $i <= $quantityNews; $i++){
                $news[$i] = [
                    'id'=> $i,
                    'title'=> \fake()->jobTitle(),
                    'description'=> \fake()->text(),
                    'author'=> \fake()->userName(),
                    'created_at'=>\now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }
        return [
            'id'=> $id,
            'title'=> \fake()->jobTitle(),
            'description'=> \fake()->text(),
            'author'=> \fake()->userName(),
            'created_at'=>\now()->format('d-m-Y H:i')
        ];
    }

    public function getCategoryNews(int $id = null){
        $categoryNews = [];
        $quantityCategories = 5;
        if($id === null){
            for($i=1; $i <= $quantityCategories; $i++){
                $categoryNews[$i] = [
                    'id'=> $i,
                    'category'=>\fake()->jobTitle(),
                    'news'=> $this->getNews()
                ];
            }
            return $categoryNews;
        }
        return [
            'id'=> $id,
            'category'=>\fake()->jobTitle(),
            'news'=> $this->getNews()
        ];
    }

    public function setNews ($title = null, $author = null, $description = null){
        $news = ['id'=> random_int(100, 999),
            'title' => $title,
            'author' => $author,
            'description' => $description
        ];
         return $news;
    }

}