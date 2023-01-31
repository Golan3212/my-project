<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;


class NewsController extends Controller
{


    public function index () : View
    {

        $model = new News();
        $newsList = $model->getNews();
        return \view('news.index', [
            'newsList'=>$newsList
        ]);

    }

    public function show (int $id = null) : View
    {
        $newsItem = new News();
       return \view('news.show', [
           'news'=> $newsItem->getNewsById($id)
       ]);
    }

    public function send ()
    {
        return \view('news.sendNews');
    }
}

