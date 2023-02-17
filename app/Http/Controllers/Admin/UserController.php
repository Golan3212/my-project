<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use App\Models\News;
use App\Models\User;
use App\QueryBuilders\UserQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param UserQueryBuilder $userQueryBuilder
     * @return View
     */
    public function index(UserQueryBuilder $userQueryBuilder) : View
    {
       return \view('admin.user.index', [
           'userList'=>$userQueryBuilder->getUsersWithPagination()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return View
     */
    public function create(User $user): View
    {
        return \view('admin.user.create',[
            'user' => $user
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
        $user = User::create($request->validated());

        if ($user)
        {
            $user->attach($request);
            return redirect()->route('admin.user.index')->with('success','user added');
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
        $model = new User();
        return \view('admin.user.show', [
           'userItem'=> $model->getUserInfo($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return \view('admin.user.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user) :RedirectResponse
    {
        $user = $user->fill($request->validated());

        if ($user->save())
        {
            $user->update();
            return redirect()->route('admin.user.index')->with('success', 'User updated');
        }

        return \back()->with('error', 'User not updated');
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
