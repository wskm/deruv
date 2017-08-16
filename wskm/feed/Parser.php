<?php

namespace wskm\feed;

use SimpleXMLElement;
use PicoFeed\Parser\XmlParser;
use PicoFeed\Filter\Filter;

class Parser
{

    public static function rss2($content)
    {
        $xml = XmlParser::getSimpleXml($content);
        if (!$xml) {
            $content = Filter::normalizeData($content);
            $xml = XmlParser::getSimpleXml($content);
            if (!$xml) {
                throw new \Exception('XML parsing error');
            }
        }

        $items = [];
        foreach (XmlParser::getXPathResult($xml, 'channel/item') as $entry) {
            $item = (array)$entry;
            $item['description'] = XmlParser::getValue($entry->description);
            
            $items[] = $item;
        }

        return $items;
    }

}
