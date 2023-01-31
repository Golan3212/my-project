<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table= 'news';

    public function getNews()
    {
        return DB::table($this->table)->select(['id', 'category_id', 'title', 'author', 'status', 'description', 'created_at'])->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)->find($id, ['id', 'category_id', 'title', 'author', 'status', 'description', 'created_at']);
    }
}
