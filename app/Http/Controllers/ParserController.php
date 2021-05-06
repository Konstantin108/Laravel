<?php

namespace App\Http\Controllers;

use App\Jobs\NewsParsing;
use App\Models\News;
use App\Services\ParserService;

class ParserController extends Controller
{

//    public function __invoke(ParserService $service)    //<-- метод загрузки новостей из яндекса в БД
//    {
//        $yandexNews = ($service->setUrl('https://news.yandex.ru/auto.rss')
//            ->parsing());
//        foreach ($yandexNews as $newsItem) {
//            if (is_array($newsItem)) {
//                foreach ($newsItem as $item) {
//                    if (is_array($item)) {
//                        foreach ($item as $key => $value) {
//                            if ($key === 'title') {
//                                $news = new News;
//                                $news->category_id = 6;
//                                $news->title = $value;
//                                $news->image = "";
//                                $news->status = "published";
//                            } elseif ($key === 'description') {
//                                $news->slug = $value;
//                                $news->text = $value;
//                            }
//                            $news->save();
//                        }
//                    }
//                }
//            }
//        }
//    }

    /**
     * @param ParserService $service
     */
    public function __invoke(ParserService $service)
    {
        $rssLinks = [
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/politics.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/sport.rss',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/games.rss'
        ];

        foreach ($rssLinks as $link){
            NewsParsing::dispatch($link);
        }

        return redirect()->route('admin.news.index', [
        ])
            ->with('success', __('messages.parsing.create.success'));
    }
}
