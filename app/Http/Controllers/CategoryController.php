<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;


class CategoryController extends Controller
{

    public function index () : View
    {

        $model = new Category();
        $categoryList = $model->getCaregory();
        $news = new News();
        $newsList = $news->getNews();
        return \view('news.category', [
            'categoryList' => $categoryList,
            'newsList' => $newsList->where('category_id', '=', 1)
        ]);
    }

    public function show (int $id = null) : View
    {
        $category = new Category();
        $news = new News();

        return \view('news.categoryNews', [
            'category' => $category->getCategoryById($id),
            'newsList'=> $news->getNews()
        ]);
    }

    public function send ()
    {
        return \view('news.sendNews', [
            'news'=> $this->setNews()
        ]);
    }
}

