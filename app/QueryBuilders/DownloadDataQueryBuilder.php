<?php
declare(strict_types=1);

namespace App\QueryBuilders;


use App\Models\DownloadData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class DownloadDataQueryBuilder extends QueryBuilder
{

    public Builder $model;

    function __construct()
    {
        $this->model = DownloadData::query();
    }

    public function getAll(): Collection
    {
        return DownloadData::query()->get();
    }

    public function getRequestById ($id): Builder
    {
        return DownloadData::query()->where('id', '=', $id);
    }
}