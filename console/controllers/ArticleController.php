<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Content;
use common\models\Article;

class ArticleController extends Controller
{

    /**
     * Atom
     */
    public function actionImport()
    {
		define('NO_USER', 'true');

        $content = file_get_contents('G:\www\test\CNBlogs_BlogBackup_131_201110_201708.xml');
        $xml = \wskm\feed\Parser::rss2($content);

        foreach($xml as $key => $row){
            //var_dump($row['description']);exit();
            $content = Content::findOne([
               'title' => $row['title']
            ]);
            if (!$content){
                $content = new Content();
            }

            $content->category_id = 1;
            $content->user_id = 1;
            $content->user_name = 'admin';
            $content->title = $row['title'];
            $content->updated_at = strtotime($row['pubDate']);
            $content->created_at = strtotime($row['pubDate']);
			$content->status = Content::STATUS_PUBLISHED;
            $ok = $content->save();
            if ($ok === false){
                throw new \Exception('content save:'.var_export($content->errors, true));
            }

            if ($ok !== false){
                $article = Article::findOne([
                   'content_id' => $content->id,
                ]);
                if (!$article){
                    $article = new Article();
                    $article->content_id = $content->id;
                    $article->detail = $row['description'];
                    $article->updated_at = strtotime($row['pubDate']);
                    
                    $article->created_at = strtotime($row['pubDate']);
                    $ok = $article->save();
                    if ($ok === false){
                        throw new \Exception('article save:'.var_export($article->errors, true));
                    }
                }

            }

            echo "ok:{$key}:".$row['title']."\n";
        }

        echo "\nend";

    }
	
	public function actionTest()
    {
		$html = <<< HTML
			<div id="cnbl
			<img src="http://xxx.png" alt="" />
			
			<img src="http://xxx.jpg" alt="" />
			<img src="http://bbb.jpg" alt="" />
			
			<img src='http://xxxf/fdd/ddx.jpg' alt="" />
HTML;
		
		
		
		preg_match_all("/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.png]))[\'|\"].*?[\/]?>/", $html, $imgs);
		
		$day = date('y_m_d', time());
		if (!isset($imgs[1])) {
			return;
		}
		
		foreach($imgs[1] as $img){
			if ($img && substr($img, 0, 4) == 'http') {
				echo "img:\t{$img}\n";
				
				$data = \wskm\helpers\Curl::get($img);
				echo "down\t";
				
				$dir = Yii::getAlias('@frontend/web/uploads/spider/'.$day);
				if (!is_dir($dir)) {
					\yii\helpers\FileHelper::createDirectory($dir);
				}
				$file = $dir.DIRECTORY_SEPARATOR. basename($img);
				file_put_contents($file, $data);
				
				echo "ok\n";
			}
		}
	}
	
}
