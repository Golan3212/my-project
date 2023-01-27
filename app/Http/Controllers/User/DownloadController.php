<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() :View
    {
        return \view('user.download.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('user.download.create');
    }

    public function store(Request $request){

        $filename = 'dataDownload.txt';
        $data =response()->json($request->only('username','phone', 'email', 'wishInfo'));
        file_put_contents($filename, $data, FILE_APPEND);
        //возврат ДЖсон только для теста, потом уберу
        return response()->json($request->only(['username','phone', 'email', 'wishInfo']));
    }

}
