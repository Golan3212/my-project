<?php
declare(strict_types=1);
namespace App\QueryBuilders;

use App\Models\Category;
use App\Models\Sources;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class SourceQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Sources::query();
    }

    function getAll(): Collection
    {
        return Sources::query()->get();
    }
}