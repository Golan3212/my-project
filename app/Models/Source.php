<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{

    use HasFactory;

    protected $table = 'sources';

    public function getSource()
    {
        return DB::table($this->table)->select(['id', 'name', 'path'])->get();
    }

    public function getSourceById(int $id)
    {
        return DB::table($this->table)->find($id, ['id', 'name', 'path']);
    }
}
