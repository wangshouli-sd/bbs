<?php
/**
 * 个人资料，用户签名
 */
	include './common/common.php';
	
	//判断用户是否登录
	if(empty($_COOKIE['uid'])){

		$msg = '<font color=red><b>您还没有登录</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	
	}

	//修改用户签名
	if($_POST['profilesubmitbtn'])
	{
		$autograph=strMagic($_POST['content']);
		$owner=DBupdate('user', 'autograph="'.$autograph.'"', 'uid='.$_COOKIE['uid'].'');
		if($owner){

			header('location:home_qm.php');

		}else{

			$msg = '<font color=red><b>错误，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		
		}
	}

	//读取用户签名
	$result=DBselect('user','*', 'uid='.$_COOKIE['uid'].' and allowlogin=0','',1);
	if(!$result){

		$msg = '<font color=red><b>用户不存在或已被管理员禁止</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style='alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;

	}
	$Jg=$result[0]['place'];
	
	
	$title='用户签名 - '.WEB_NAME;
	include template("home_qm.html");

?>
