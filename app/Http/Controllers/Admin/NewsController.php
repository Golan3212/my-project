<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use App\Services\UploadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use function Symfony\Component\String\s;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder) : View
    {
       return \view('admin.news.index', [
           'newsList'=>$newsQueryBuilder->getNewsWithPagination()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param News $news
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @param SourceQueryBuilder $sourceQueryBuilder
     * @return View
     */
    public function create(News $news, CategoryQueryBuilder $categoryQueryBuilder, SourceQueryBuilder $sourceQueryBuilder): View
    {
        return \view('admin.news.create',[
            'news' => $news,
            'categories' => $categoryQueryBuilder->getAll(),
            'statusList' => NewsStatus::all(),
            'sources' => $sourceQueryBuilder->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());

        if ($news)
        {
            $news->categories()->attach($request->getCategoryIds());
            $news->sources()->attach($request->getSourceId());
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
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
     * @param SourceQueryBuilder $sourceQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoryQueryBuilder $categoryQueryBuilder, SourceQueryBuilder $sourceQueryBuilder): View
    {
        return \view('admin.news.edit',[
            'news' => $news,
            'categories' => $categoryQueryBuilder->getAll(),
            'sources' => $sourceQueryBuilder->getAll(),
            'statusList' => NewsStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news, UploadService $uploadService) :RedirectResponse
    {
        $validated = $request->validated();
        $news = $news->fill($validated);

        if ($request->hasFile('image')){
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }
        if ($news->update($validated))
        {
            $news->categories()->sync($request->getCategoryIds());
            $news->sources()->sync($request->getSourceId());
            return redirect()->route('admin.news.index')->with('success', 'News updated');
        }

        return \back()->with('error', 'News not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(News $news) : JsonResponse
    {
        try {
            $news->delete();
            return \response()->json('ok', 200);

        }catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
