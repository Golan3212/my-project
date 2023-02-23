<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;


class NewsController extends Controller
{

    public function index(NewsQueryBuilder $newsQueryBuilder) : View
    {
        return \view('news.index', [
            'newsList'=>$newsQueryBuilder->getNewsWithPagination()
        ]);
    }

    public function show (News $news) :View
    {
       return \view('news.show', [
           'news'=> $news,
       ]);
    }

    public function send ()
    {
        return \view('news.sendNews');
    }
}

