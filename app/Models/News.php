<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getCount(): int
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at', 'theme'])
            ->count();
    }

    public function getNews(bool $isAdmin = false): Collection
    {
        if(!$isAdmin){
        return \DB::table($this->table)
                    ->join('categories', 'categories.id', '=', 'news.category_id')
                    ->select(['news.id',
                              'news.title as title',
                              'news.text',
                              'news.created_at',
                              'news.status',
                              'news.theme',
                              'categories.title as categories_title'
                        ])
                    ->where('news.status', NewsStatusEnum::PUBLISHED)
                    ->get();
        }
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at',  'status', 'theme'])
            ->get();
    }

    public function getNewsByCategoryId(int $categoryId, bool $isAdmin = false): Collection
    {
        if(!$isAdmin){
            return \DB::table($this->table)
                ->join('categories', 'categories.id', '=', 'news.category_id')
                ->select(['news.id',
                          'news.category_id',
                          'news.title as title',
                          'news.text',
                          'news.status',
                          'news.created_at',
                          'news.theme',
                          'categories.title as categories_title'
                ])
                ->where([
                    ['category_id', $categoryId],
                    ['status', NewsStatusEnum::PUBLISHED]
                ])
                ->get();
        }
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at',  'status', 'theme'])
            ->get();
    }

    public function getNewsById(int $id): ?object
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at'])
            ->where('id', $id)
            ->first();
    }
}
