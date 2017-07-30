<?php

namespace frontend\controllers;

use DateTime;
use Yii;
use Wskm;
use common\models\Content;
use wskm\feed\RssBuilder;
use wskm\feed\AtomBuilder;
use PicoFeed\Syndication\Rss20ItemBuilder;
use PicoFeed\Syndication\AtomItemBuilder;

class FeedController extends BaseController
{
    public function load()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
    }

    public function actionRss()
    {
        $feedBuilder = RssBuilder::create()
            ->withTitle(\service\Setting::getParamConf('webName'))
            ->withAuthor('Deruv')
            ->withFeedUrl(Yii::$app->request->absoluteUrl)
            ->withSiteUrl(\Wskm::getWebUrl())
            ->withDate(new DateTime());
        
        foreach (Content::find()->orderBy(['id' => SORT_DESC])->each(20) as $content) {
            $publishedDate = new DateTime();
            $publishedDate->setTimestamp($content->created_at);

            $updatedDate = new DateTime();
            $updatedDate->setTimestamp($content->updated_at);

            $html = $content->article->detail;
            $pOffset = strpos($html, '</p>');
            if ($pOffset !== false) {
                $html = substr($html, 0, $pOffset + 4);
            }

            $feedBuilder->withItem(Rss20ItemBuilder::create($feedBuilder)
                    ->withTitle($content->title)
                    ->withUrl(Wskm::url(['/article', 'id' => $content->id], true))
                    ->withAuthor($content->user_name)
                    ->withPublishedDate($publishedDate)
                    ->withUpdatedDate($updatedDate)
                    ->withSummary($content->summary)
                    ->withContent($html)
            );
        }

        echo $feedBuilder->build();
    }

    public function actionAtom()
    {
        $feedBuilder = AtomBuilder::create()
            ->withTitle(\service\Setting::getParamConf('webName'))
            ->withAuthor('Deruv')
            ->withFeedUrl(Yii::$app->request->absoluteUrl)
            ->withSiteUrl(\Wskm::getWebUrl())
            ->withDate(new DateTime());

        foreach (Content::find()->orderBy(['id' => SORT_DESC])->each(20) as $content) {
            $publishedDate = new DateTime();
            $publishedDate->setTimestamp($content->created_at);

            $updatedDate = new DateTime();
            $updatedDate->setTimestamp($content->updated_at);

            $html = $content->article->detail;
            $pOffset = strpos($html, '</p>');
            if ($pOffset !== false) {
                $html = substr($html, 0, $pOffset + 4);
            }

            $feedBuilder->withItem(AtomItemBuilder::create($feedBuilder)
                    ->withTitle($content->title)
                    ->withUrl(Wskm::url(['/article', 'id' => $content->id], true))
                    ->withAuthor($content->user_name)
                    ->withPublishedDate($publishedDate)
                    ->withUpdatedDate($updatedDate)
                    ->withSummary($content->summary)
                    ->withContent($html)
            );
        }

        echo $feedBuilder->build();
    }

}
