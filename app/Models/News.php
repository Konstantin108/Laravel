<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;


/**
 * App\Models\News
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @property string $theme
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
//    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
            'category_id',
            'title',
            'slug',
            'image',
            'text',
            'status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

//    public function getCount(): int
//    {
//        return \DB::table($this->table)
//            ->select(['id', 'title', 'text', 'created_at', 'theme'])
//            ->count();
//    }

//    public function getNews(bool $isAdmin = false): Collection
//    {
//        if(!$isAdmin){
//        return \DB::table($this->table)
//                    ->join('categories', 'categories.id', '=', 'news.category_id')
//                    ->select(['news.id',
//                              'news.title as title',
//                              'news.text',
//                              'news.created_at',
//                              'news.status',
//                              'news.theme',
//                              'categories.title as categories_title'
//                        ])
//                    ->where('news.status', NewsStatusEnum::PUBLISHED)
//                    ->get();
//        }
//    }

//    public function getNewsByCategoryId(int $categoryId, bool $isAdmin = false): Collection
//    {
//        if(!$isAdmin){
//            return \DB::table($this->table)
//                ->join('categories', 'categories.id', '=', 'news.category_id')
//                ->select(['news.id',
//                          'news.category_id',
//                          'news.title as title',
//                          'news.text',
//                          'news.status',
//                          'news.created_at',
//                          'news.theme',
//                          'categories.title as categories_title'
//                ])
//                ->where([
//                    ['category_id', $categoryId],
//                    ['status', NewsStatusEnum::PUBLISHED]
//                ])
//                ->get();
//        }
//        return \DB::table($this->table)
//            ->select(['id', 'title', 'text', 'created_at',  'status', 'theme'])
//            ->get();
//    }

//    public function getNewsById(int $id): ?object
//    {
//        return \DB::table($this->table)
//            ->select(['id', 'title', 'text', 'created_at'])
//            ->where('id', $id)
//            ->first();
//    }
}
