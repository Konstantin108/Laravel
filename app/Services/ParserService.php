<?php declare(strict_types=1);


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

//    public function parsing(): array    //<-- список новостей без очередей
//    {
//        $xml = XmlParser::load($this->url);
//        return $xml->parse([
//          'news' => [
//                'uses' => 'channel.item[title,link,guid,description,pubDate]'
//            ]
//        ]);
//    }

    public function parsing(): void
    {
        $e = explode("/", $this->url);
        $category_status = '';
        $fileName = end($e);
        if($fileName === 'army.rss'){
            $category_status = 1;
        }
        elseif ($fileName === 'culture.rss'){
            $category_status = 2;
        }
        elseif ($fileName === 'politics.rss'){
            $category_status = 3;
        }
        elseif ($fileName === 'music.rss'){
            $category_status = 4;
        }
        elseif ($fileName === 'sport.rss'){
            $category_status = 5;
        }
        elseif ($fileName === 'auto.rss'){
            $category_status = 6;
        }
        elseif ($fileName === 'games.rss'){
            $category_status = 7;
        }
        $xml = XmlParser::load($this->url);
        $data = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
        foreach ($data as $newsItem) {
            if (is_array($newsItem)) {
                foreach ($newsItem as $item) {
                    if (is_array($item)) {
                        foreach ($item as $key => $value) {
                            if ($key === 'title') {
                                $news = new News;
                                $news->category_id = $category_status;
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
