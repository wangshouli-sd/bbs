<?php
/**
 * 忘记密码
 */

	include './common/common.php';

	$title = " 找回密码 - " . WEB_NAME;
	if(!empty($_POST['regsubmit']))
	{
		$uname = strMagic($_POST['username']);
		$umail = $_POST['mail'];
		$pyzm = $_POST['yzm'];
		
		//错误跳转页默认值
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;

		//判断验证码
		if(checkVerify($pyzm, $_SESSION['code']))
		{
			$msgArr[] = '<font color=red><b>验证码输入错误</b></font>';
		}
		
		//验证email
		if(checkEmail($umail))
		{
			$msgArr[] = '<font color=red><b>错误：邮箱不合法</b></font>';
		}

		$result = dbSelect('user','uid,username,email', 'username="'.$uname.'" and email="'.$umail.'"');
		if(!$result)
		{
			$msgArr[] = '<font color=red><b>抱歉，您填写的账户资料不匹配，不能使用取回密码功能，如有疑问请与管理员联系</b></font>';
		}else{
			//发送邮件
			$msgArr[] = '<font color=green><b>取回密码的方法已通过 Email 发送到您的信箱中，请在 3 天之内修改您的密码</b></font>';
			$url = 'index.php';
			$style = 'alert_right';
		}

		$msg = join('<br />', $msgArr);
		include 'notice.php';
		exit;
		
	}

	include template("getpass.html");
