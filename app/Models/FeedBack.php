<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FeedBack extends Model
{

    use HasFactory;

    /**
     * @var \Illuminate\Database\Eloquent\Collection|mixed
     */

    protected $table= 'feedback';
    protected $fillable = [
        'username',
        'comment',
    ];

    public function getCommentById(int $id)
    {
        return DB::table($this->table)->find($id, ['id', 'username', 'comment']);
    }
}