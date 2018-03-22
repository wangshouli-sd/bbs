<?php
/**
 * 个人资料，修改密码
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

	//修改密码
	if($_POST['pwdsubmit'])
	{
		$oldpassword = md5(trim($_POST['oldpassword']));
		$newpassword = trim($_POST['newpassword']);
		$newpassword2 = trim($_POST['newpassword2']);
		$emailnew = $_POST['emailnew'];
		$questionidnew = $_POST['questionidnew'];
		$answernew = strMagic($_POST['answernew']);
		
		//错误跳转页默认值
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		
		//验证原密码是否正确
		$old = dbSelect('user','uid', 'uid='.$_COOKIE['uid'].' and password="'.$oldpassword.'"');
		if(!$old)
		{
			$msg = '<font color=red><b>旧密码不正确</b></font>';
			include 'notice.php';
			exit;
		}

		//验证密码长度
		if(stringLen($newpassword))
		{
			$msg = '<font color=red><b>密码长度错误：由 3 到 12 个字符组成</b></font>';
			include 'notice.php';
			exit;
		}
		
		//验证两次密码是否一致
		if(str2Equal($newpassword, $newpassword2))
		{
			$msg = '<font color=red><b>错误：两次密码不一致</b></font>';
			include 'notice.php';
			exit;
		}

		//验证email
		if(checkEmail($emailnew))
		{
			$msg = '<font color=red><b>错误：邮箱不合法</b></font>';
			include 'notice.php';
			exit;
		}

		$owner = dbUpdate('user', 'password="'.md5($newpassword).'",email="'.$emailnew.'",problem="'.$questionidnew.'",result="'.$answernew.'"', 'uid='.$_COOKIE['uid'].'');
		if($owner)
		{
			header('location:home_pass.php');
		}else{
			$msg = '<font color=red><b>错误，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		}
	}

	//读取用户密码安全信息
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
	
	$title = '密码安全 - '.WEB_NAME;
	include template("home_pass.html");

?>
