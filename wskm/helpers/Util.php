<?php

namespace wskm\helpers;

class Util
{
    public static function flushStart()
	{
		if (!function_exists('fastcgi_finish_request')) {
            header('X-Accel-Buffering: no');
            
			ob_end_flush();
			ob_start();
		}
	}

	public static function flushEnd()
	{
		if (function_exists('fastcgi_finish_request')) {
			fastcgi_finish_request();
		} else {
			//header("Content-Type: text/html;charset=utf-8");
			//header("Connection: close");
			//header('Content-Length: ' . ob_get_length());
			ob_flush();
			flush();
		}
	}
}
