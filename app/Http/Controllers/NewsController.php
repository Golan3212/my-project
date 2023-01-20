<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index ()
    {
        return \view('news.index', [
            'news'=> $this->getNews()
        ]);
    }

    public function show (int $id = null)
    {
       return \view('news.show', [
           'news'=> $this->getNews($id)
       ]);
    }

    public function send ()
    {
        return \view('news.sendNews', [
           'news'=> $this->setNews()
        ]);
    }
}

