<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome ()
    {
        return "Welcome! Some info about site will be there, <a href='resources/views/news/sendNews.php'>Баттон</a>";
    }

}
