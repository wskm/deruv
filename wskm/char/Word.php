<?php

namespace wskm\char;


class Word
{
    
    private static $singleObj;

    public static function getKeywords($str, $num = 10)
    {
        if (!is_object(self::$singleObj)) {
            self::$singleObj = new ChineseAnalysis('utf-8', 'utf-8');
            self::$singleObj->differMax = false;
            self::$singleObj->unitWord = true;
        }
        
        self::$singleObj->SetSource(strip_tags($str));
        self::$singleObj->StartAnalysis(true);
        
        $words = explode(',', strtolower(self::$singleObj->GetFinallyKeywords($num*2)));
        return array_slice(ChineseAnalysis::filterInvalid($words), 0, $num);
    }
    
}
