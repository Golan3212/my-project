<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class News extends Model
{

    use HasFactory;

    /**
     * @var \Illuminate\Database\Eloquent\Collection|mixed
     */

    protected $table= 'news';
    protected $fillable = [
        'title',
        'author',
        'status',
        'image',
        'description',
    ];
    protected $casts = [
        'categories_id' => 'array',
        'source_id' => 'int'
    ];

    protected function author() : Attribute
    {
        return Attribute::make(
            get: fn($value) => strtoupper($value),
            set: fn($value) => strtolower($value)
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id');
    }

    public function sources(): BelongsToMany
    {
        return $this->belongsToMany(Source::class, 'source_has_news', 'news_id', 'source_id');
    }
}
