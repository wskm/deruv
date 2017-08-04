<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Install';
?>

<div class="container-fluid" style="min-height: 438px;" >
	<h3>Installation process</h3>
	<div class="progress">
		<div id="progress" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
		</div>
	</div>
	
	<div id="install-msg">
	</div>
	
</div>
<script>
	var curKey = '';
	function writeMsg(msg, className) {
		if (!className) {
			className = '';
		}
		
		var obj = $('#install-msg');
		obj.append('<p class="' + className + '" ><span class="glyphicon glyphicon-menu-right" style="color:#5a5a5a;margin-right: 2px;" ></span><samp>' + msg + '</samp></p>');
		obj.scrollTop(obj.prop("scrollHeight"));
	}
	
	function itemStart(key, data) {
		curKey = key;
		switch(key)
		{
            case 'sql':
				$('#progress').width('50%');
                
				writeMsg('Start import data.');                                
				toSql();
				break;
                
			case 'param':		
                $('#progress').width('60%');
                $.each(data, function(i, obj){
                    writeMsg('Create table : ' + obj, 'text-info');
                });
                
				writeMsg('Start configuring parameters.');
				toParam();
				break;
            
			case 'user':
				$('#progress').width('80%');                                
                
				writeMsg('Start add an administrator.');
				toUser();
				break;
			case 'cache':
				$('#progress').width('90%');
                
                $.each(data, function(i, obj){
                    writeMsg('Create user : ' + obj, 'text-warning');
                });
                
				writeMsg('Start refresh cache.');
				toCache();
				break;
			case 'end':
				$('#progress').width('100%');
				writeMsg('Over!', 'text-success');
                goDone();
				break;
		}
	}
        
	function itemError(xhr) {
		writeMsg(curKey + ' -> ' + xhr.responseText, 'text-danger');
	}
    
	function goDone() {
        var num = 5;
        var goOver = setInterval(function(){
            if (num < 1) {
                clearInterval(goOver);
                location.href = 'index.php?r=install/done';
                return;
            }
            
            writeMsg(num, 'text-danger');
            num--;
        }, 1000);
    }
    
	function toDb(){
		$.ajax({
			type : "get",
			url : 'index.php?r=install/install-db',
		}).done(function(r) {
			itemStart('sql', r);
		}).fail(function(xhr) {
			itemError(xhr);
		});
	}
    
	function toSql(){
		$.ajax({
			type : "get",
			url : 'index.php?r=install/install-sql',
            dataType : 'json',
		}).done(function(r) {
			itemStart('param', r);
		}).fail(function(xhr) {
			itemError(xhr);
		});
	}
    
	function toParam(){
		$.ajax({
			type : "get",
			url : 'index.php?r=install/install-param',
			data : '',
			//dataType : 'json'
		}).done(function(r) {
			itemStart('user', r);
		}).fail(function(xhr) {
			itemError(xhr);
		});
	}
		
	function toUser(){
		$.ajax({
			type : "get",
			url : 'index.php?r=install/install-user',
		}).done(function(r) {
			itemStart('cache', r);
		}).fail(function(xhr) {
			itemError(xhr);
		});
	}
	
	function toCache(){
		$.ajax({
			type : "get",
			url : 'index.php?r=install/install-cache',
		}).done(function(r) {
			itemStart('end', r);
		}).fail(function(xhr) {
			itemError(xhr);
		});
	}
	
	function startInstall() {
		writeMsg('Begin');
		writeMsg('Start configuring database.');
		toDb();
	}
	
	startInstall();
	
</script>
