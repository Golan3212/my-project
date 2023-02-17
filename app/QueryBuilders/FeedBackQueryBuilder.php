<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\FeedBack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class FeedBackQueryBuilder extends QueryBuilder
{

    public Builder $model;

    function __construct()
    {
        $this->model = FeedBack::query();
    }

    public function getAll(): Collection
    {
        return FeedBack::query()->get();
    }
}