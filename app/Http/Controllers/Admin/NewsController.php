<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(

        NewsQueryBuilder $newsQueryBuilder) : View
    {

       return \view('admin.news.index', [
           'newsList'=>$newsQueryBuilder->getNewsWithPagination()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @return View
     */
    public function create(News $news, CategoryQueryBuilder $categoryQueryBuilder,): View
    {
        return \view('admin.news.create',[
            'news' => $news,
            'categories' => $categoryQueryBuilder->getAll(),
            'statusList' => NewsStatus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $news = new News($request->except('_token', 'category_id'));
        if ($news->save())
        {
            return redirect()->route('admin.news.index')->with('success', 'News added');
        }

        return \back()->with('error', 'News not added');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) :View
    {
        $model = new News();
       return \view('admin.news.show', [
           'newsItem'=> $model->getNewsById($id)
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoryQueryBuilder $categoryQueryBuilder): View
    {
        return \view('admin.news.edit',[
            'news' => $news,
            'categories' => $categoryQueryBuilder->getAll(),
            'statusList' => NewsStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news) :RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'category_ids'));
        if ($news->save())
        {
            $news->categories()->sync((array) $request->input('category_ids'));
            return redirect()->route('admin.news.index')->with('success', 'News updated');
        }

        return \back()->with('error', 'News not updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
