<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use NewsTrait;

    public function categoryNews ()
    {
        return \view('news.category', [
            'categoryNews'=> $this->getCategoryNews()
        ]);
    }

    public function showCategoryNews (int $id)
    {
        return \view('news.categoryNews', [
            'categoryNews'=> $this->getCategoryNews($id)
        ]);
    }
}
