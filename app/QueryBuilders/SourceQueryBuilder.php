<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class SourceQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }

    function getAll(): Collection
    {
        return Source::query()->get();
    }

    function getPath()
    {
        return Source::query()->get('path');
    }
}