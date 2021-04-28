<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\ParserService;

class ParserController extends Controller
{

    public function __invoke(ParserService $service)
    {
        $yandexNews = ($service->setUrl('https://news.yandex.ru/auto.rss')
            ->parsing());
        foreach ($yandexNews as $newsItem) {
            if (is_array($newsItem)) {
                foreach ($newsItem as $item) {
                    if (is_array($item)) {
                        foreach ($item as $key => $value) {
                            if ($key === 'title') {
                                $news = new News;
                                $news->category_id = 6;
                                $news->title = $value;
                                $news->image = "";
                                $news->status = "published";
                            } elseif ($key === 'description') {
                                $news->slug = $value;
                                $news->text = $value;
                            }
                            $news->save();
                        }
                    }
                }
            }
        }
    }
}
