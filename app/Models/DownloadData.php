<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DownloadData extends Model
{

    use HasFactory;

    protected $table= 'download_data';
    protected $fillable = [
        'username',
        'phone',
        'email',
        'comment_to_get',
    ];

    public function getRequestById(int $id)
    {
        return DB::table($this->table)->find($id, ['id','username', 'phone', 'email', 'comment_to_get',]);
    }
}