<?php declare(strict_types=1);


namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function parsing(): array
    {
        $xml = XmlParser::load($this->url);
        return $xml->parse([
          'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }
}
