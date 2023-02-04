<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DownloadData;
use App\QueryBuilders\DownloadDataQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) :RedirectResponse
    {
        $data = new DownloadData($request->except('_token'));
        if ($data->save())
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
     * @param Request $request
     * @param DownloadData $downloadData
     * @return RedirectResponse
     */
    public function update(Request $request, DownloadData $download) :RedirectResponse
    {
        $download = $download->fill($request->except('_token', 'id'));
        if ($download->save())
        {
            $download->update($request->input());
            return redirect()->route('user.download.index')->with('success', 'request updated');
        }

        return \back()->with('error', 'Request not updated');

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
