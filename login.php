<?php
/**
 * 登陆
 */
	include './common/common.php';

	$username = strMagic($_POST['username']);
	$password = trim($_POST['password']);
	$cookietime = $_POST['cookietime'];

	$result = dbSelect('user','uid,username,udertype,picture,grade,allowlogin,lasttime', 'username="'.$username.'" and password="'.md5($password).'"');

	//判断是否使用了自动登录
	if($cookietime)
	{
		$longTime = time()+2592000;
	}else{
		$longTime = time()+86400;	
	}

	if(!$result)
	{
		$msg = '<font color=red><b>登录失败，用户名或密码错误</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
	}else{
		if($result[0]['allowlogin'])
		{
			$msg = '<font color=red><b>您的账号已经被锁定，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		}
		$money = REWARD_LOGIN;
		if(formatTime($result[0]['lasttime'])<date('Y-m-d'))
		{
			//更新最后登录时间,首次登陆还要加积分
			$lasttime = dbUpdate('user', 'lasttime='.time().',grade=grade+'.(int)$money.'', 'uid='.$result[0]['uid'].'');
			$first = true;
			$grade = $result[0]['grade']+(int)$money;
		}else{
			//更新最后登录时间
			$lasttime = dbUpdate('user', 'lasttime='.time().'', 'uid='.$result[0]['uid'].'');
			$grade = $result[0]['grade'];
		}
		setcookie('uid',$result[0]['uid'],$longTime);
		setcookie('username',$result[0]['username'],time()+2592000);
		setcookie('udertype',$result[0]['udertype'],$longTime);
		setcookie('picture',$result[0]['picture'],$longTime);
		setcookie('grade',$grade,$longTime);

		$msg = '<font color=green><b>登录成功</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_right';
		$toTime = 3000;
		
		include 'notice.php';

		if($first)
		{
			$msg = '每天登陆';
			include 'layer.php';
		}
	
	}

