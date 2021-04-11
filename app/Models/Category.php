<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

//    public function getCategories(): array
//    {
//        return \DB::select("select id, title, created_at from categories");   //<-- простой, но долгий ваиант
//    }

    /**
     * @var string
     */
    protected $table = "categories";

    public function getCategories(): \Illuminate\Support\Collection
    {
        return \DB::table($this->table)
                    ->select(['id', 'title', 'created_at', 'description'])
                    ->where('is_visible', true)
                    ->get();
    }
}
