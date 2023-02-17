<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    use HasFactory;

    protected $table = 'categories';

    public function getCaregory()
    {
        return DB::table($this->table)->select(['id',  'title', 'description', 'created_at'])->get();
    }

    public function getCategoryById(int $id)
    {
        return DB::table($this->table)->find($id, ['id',  'title', 'description', 'created_at']);
    }
}
