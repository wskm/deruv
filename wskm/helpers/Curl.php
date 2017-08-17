<?php

namespace wskm\helpers;

class Curl
{
	public static function post($url, $post)
	{
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
		);

		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		
		if ($result === false) {
			throw new \Exception('Curl post: '.curl_error($ch));
		}
		curl_close($ch);
		
		return $result;
	}

	public static function get($url)
	{
		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
		);
		
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
