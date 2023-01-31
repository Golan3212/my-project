<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() :View
    {
        return \view('user.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('user.feedback.create');
    }

   public function store(Request $request){
       $filename = 'dataFeedback.txt';
       $data =response()->json($request->only('author','comment'));

       $save = file_put_contents($filename, $data, FILE_APPEND);

       return $save;
   }


}
