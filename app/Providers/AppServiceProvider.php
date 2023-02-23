<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\DownloadDataQueryBuilder;
use App\QueryBuilders\FeedBackQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use App\QueryBuilders\UserQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadService;
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
        $this->app->bind(QueryBuilder::class, UserQueryBuilder::class);
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(UploadService::class);
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
