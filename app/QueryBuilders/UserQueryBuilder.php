<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class UserQueryBuilder extends QueryBuilder
{

    public Builder $model;

    function __construct()
    {
       $this->model = User::query();
    }

    public function getUsersWithPagination( int $quantity = 10) : LengthAwarePaginator
    {
    return $this->model->paginate($quantity);
    }

   public function getAll(): Collection
    {
        return User::query()->get();
    }

    public function getUserInfo ($id) :Collection
    {
        return User::query()->where('id', $id)->get();
    }
}