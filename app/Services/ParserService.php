<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink($link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData()
    {
        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,category,description,pubDate]'
            ],
        ]);

        $queryNews = new NewsQueryBuilder;

           foreach ($data["news"] as $news){
            News::create([
                'title' => $news['title'],
                'link' => $news['link'],
                'description' => $news['description'],
                'created_at' => $news['pubDate']
            ]);
        }

        return $data;
    }

}