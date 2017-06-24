<?php

namespace wskm;

class Status
{

	public static function getNoOrYes()
	{
		return [
			\Wskm::t('No'),
			\Wskm::t('Yes'),
		];
	}
	// 
	
	public static function getPublishedOrUnpublished()
	{
		return [
			\Wskm::t('Unpublished', 'admin'),
			\Wskm::t('Published', 'admin'),
		];
	}
	
	public static function getEnableOrDisable()
	{
		return [
			\Wskm::t('Disable', 'admin'),
			\Wskm::t('Enable', 'admin'),
		];
	}
	
	public static function getFailOrSuccess()
	{
		return [
			\Wskm::t('Fail', 'admin'),
			\Wskm::t('Success', 'admin'),
		];
	}
	
	public static function getIcons()
	{
		return [
			'<span class="glyphicon glyphicon-remove-sign text-danger" ></span>',
			'<span class="glyphicon glyphicon-ok-sign text-success" ></span>',
		];
	}

}
