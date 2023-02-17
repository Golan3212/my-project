<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DownloadData\CreateRequest;
use App\Http\Requests\DownloadData\EditRequest;
use App\Models\DownloadData;
use App\QueryBuilders\DownloadDataQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DownloadDataQueryBuilder $downloadDataQueryBuilder
     * @return View
     */
    public function index( DownloadDataQueryBuilder $downloadDataQueryBuilder) :View
    {
        return \view('user.download.index',[
            'downloadData' => $downloadDataQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param DownloadDataQueryBuilder $downloadDataQueryBuilder
     * @return View
     */
    public function create(DownloadDataQueryBuilder $downloadDataQueryBuilder): View
    {
        return \view('user.download.create',[
            'downloadItem' => $downloadDataQueryBuilder
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id) :View
    {
        $model = new DownloadData();
        return \view('user.download.show', [
            'downloadItem'=> $model->getRequestById($id)
        ]);
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request) :RedirectResponse
    {
        $data = DownloadData::create($request->validated());
        if ($data)
        {
            return redirect()->route('user.download.index')->with('success', 'request sent');
        }

        return \back()->with('error', 'request not sent');
    }

    /**
     * @param int $id
     * @param DownloadDataQueryBuilder $downloadDataQueryBuilder
     * @return View
     */
    public function edit(int $id, DownloadDataQueryBuilder $downloadDataQueryBuilder): View
    {
        return \view('user.download.edit',[
            'downloadItem' => $downloadDataQueryBuilder->model->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param DownloadData $download
     * @return RedirectResponse
     */
    public function update(EditRequest $request, DownloadData $download) :RedirectResponse
    {
        $download = $download->fill($request->validated());

        if ($download)
        {
            $download->update($request->input());
            return redirect()->route('user.download.index')->with('success', 'request updated');
        }

        return \back()->with('error', 'Request not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DownloadData $data
     * @return JsonResponse
     */
    public function destroy(DownloadData $data) : JsonResponse
    {
        try {
            $data->delete();
            return \response()->json('ok');

        }catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }


}
