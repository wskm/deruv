<?php

namespace wskm\helpers;

class Curl
{
	public static function post($url, $post, array $args = [])
	{
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
		);
        if ($args) {
            $options = array_merge($options, $args);
        }
        
		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		
		if ($result === false) {
			throw new \Exception('Curl post: '.curl_error($ch));
		}
		curl_close($ch);
		
		return $result;
	}

	public static function get($url, array $args = [], $timeout = 10)
	{
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_TIMEOUT => $timeout,
		);
        
        if ($args) {
            $options = array_merge($options, $args);
        }
		
		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$output = curl_exec($ch);				
		
		if ($output === false) {
			throw new \Exception('Curl get: '.curl_error($ch));
		}
		curl_close($ch);

		return $output;
	}
	
}
