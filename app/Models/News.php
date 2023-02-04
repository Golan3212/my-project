<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
      'categories_id' => 'array'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id');
    }

    public function sources(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

//    public function getNews()
//    {
//        return DB::table($this->table)->select(['id', 'category_id', 'title', 'author', 'status', 'description', 'created_at'])->get();
//    }
//
//    public function getNewsById(int $id)
//    {
//        return DB::table($this->table)->find($id, ['id', 'category_id', 'title', 'author', 'status', 'description', 'created_at']);
//    }
}
