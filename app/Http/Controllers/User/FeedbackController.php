<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use App\QueryBuilders\FeedBackQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FeedBackQueryBuilder $feedBackQueryBuilder) :View
    {
        return \view('user.feedback.index', [
            'feedbackList'=>$feedBackQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FeedBackQueryBuilder $feedBackQueryBuilder): View
    {
        return \view('user.feedback.create',[
            'feedbackList' => $feedBackQueryBuilder
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
        $model = new FeedBack();
        return \view('user.feedback.show', [
            'feedbackItem'=> $model->getCommentById($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
   public function store(Request $request): RedirectResponse
   {
       $feedback = new FeedBack($request->except('_token'));
       if ($feedback->save())
       {
           return redirect()->route('user.feedback.index')->with('success', 'feedback sent');
       }

       return \back()->with('error', ' not sent');
   }


    /**
     * @param int $id
     * @param FeedBackQueryBuilder $feedBackQueryBuilder
     * @return View
     */
    public function edit(   int $id, FeedBackQueryBuilder $feedBackQueryBuilder): View
    {
        return \view('user.feedback.edit',[
            'feedbackItem' => $feedBackQueryBuilder->model->find($id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FeedBack $feedback
     * @return RedirectResponse
     */
    public function update(Request $request, FeedBack $feedback) :RedirectResponse
    {
        $feedback = $feedback->fill($request->except('_token', 'id'));
        if ($feedback->save())
        {
            $feedback->update($request->input());
            return redirect()->route('user.feedback.index')->with('success', 'News updated');
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
