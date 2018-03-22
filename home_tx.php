<?php
/**
 * 个人资料，用户签名
 */

	include './common/common.php';

	//判断用户是否登录
	if(empty($_COOKIE['uid']))
	{
		$msg = '<font color=red><b>您还没有登录</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	}

	//修改头像
	if($_POST['profilesubmitbtn'])
	{
		$picture = upload('pic');
		$owner = dbUpdate('user', 'picture="'.$picture.'"', 'uid='.$_COOKIE['uid'].'');
		if($owner){
			setcookie('picture',$picture,2592000);
			header('location:home_tx.php');
		}else{
			$msg = '<font color=red><b>错误，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		}
	}

	//读取头像
	$result = dbSelect('user','*', 'uid='.$_COOKIE['uid'].' and allowlogin=0','',1);
	if(!$result)
	{
		$msg = '<font color=red><b>用户不存在或已被管理员禁止</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	}
	$Jg = $result[0]['place'];
	
	
	$title = '用户签名 - '.WEB_NAME;
	include template("home_tx.html");

?>
