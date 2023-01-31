<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sources extends Model
{
    use HasFactory;

    protected $table = 'sources';



    public function getSources()
    {
        return DB::table($this->table)->select(['id',  'category', 'news', 'source', 'path'])->get();
    }

    public function getSourceById(int $id)
    {
        return DB::table($this->table)->find($id, ['id',  'category', 'news', 'source', 'path']);
    }
}
