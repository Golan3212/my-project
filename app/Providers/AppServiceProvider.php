<?php
declare(strict_types=1);
namespace App\Providers;

use App\Models\DownloadData;
use App\Models\FeedBack;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\DownloadDataQueryBuilder;
use App\QueryBuilders\FeedBackQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register():void
    {
        $this->app->bind(QueryBuilder::class, CategoryQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SourceQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, DownloadDataQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, FeedBackQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrapFour();
    }

}
