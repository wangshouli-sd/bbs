<?php
/**
 * 注册
 */
	include './common/common.php';

	$title = '用户注册 - ' . WEB_NAME;

	//验证是否为提交注册信息
	if (!empty($_POST['regsubmit']))
	{
		$uname = strMagic($_POST['username']);
		$upass = trim($_POST['password']);
		$urpass = trim($_POST['repassword']);
		$umail = $_POST['mail'];
		$pyzm = $_POST['yzm'];
		
		//错误跳转页默认值
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;

		$alterNotice = false;	//提示页面标记位
		//验证用户名长度
		if(stringLen($uname))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>用户名长度错误：用户名由 3 到 12 个字符组成</b></font>';
		}

		//判断数据库里是否存在这个用户名
		$exists = dbSelect('user','uid', 'username="'.$uname.'"','uid desc',1);
		if($exists)
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>用户名已存在</b></font>';
		}
		
		//验证密码长度
		if(stringLen($upass))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>密码长度错误：由 3 到 12 个字符组成</b></font>';
		}
		
		//验证两次密码是否一致
		if(str2Equal($upass, $urpass))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>错误：两次密码不一致</b></font>';
		}
		
		//验证email
		if(checkEmail($umail))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>错误：邮箱不合法</b></font>';
		}

		//判断验证码
		if(checkVerify($pyzm, $_SESSION['code']))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>验证码输入错误</b></font>';
		}

		//验证是否需要显示提示信息
		if($alterNotice)
		{
			$msg = join('<br />', $msgArr);
			include 'notice.php';
			exit;
		}

		//创建用户
		$money = REWARD_REG;
		$n = 'username, password, email, udertype, regtime, lasttime, regip, grade';
		$v = "'$uname', '".md5($upass)."', '$umail', 0, ".time().", ".time().", ".ip2long($_SERVER['REMOTE_ADDR']).", ".$money;
		$result = dbInsert('user', $n, $v);
		if(!$result)
		{
			$msg = '<font color=red><b>注册失败，请联系管理员</b></font>';
			include 'notice.php';
		}else{
			//注册成功后自动登录
			$result = dbSelect('user', 'uid,username,udertype,picture,grade', 'username="'.$uname.'" and password="'.md5($upass).'"', 'uid desc', 1);

			setcookie('uid',$result[0]['uid'],time()+86400);
			setcookie('username',$result[0]['username'],time()+2592000);
			setcookie('udertype',$result[0]['udertype'],time()+86400);
			setcookie('picture',$result[0]['picture'],time()+86400);
			setcookie('grade',$result[0]['grade'],time()+86400);
			
			$msg = '<font color=green><b>感谢您的注册，现在将以会员身份登录站点</b></font>';
			$url = 'index.php';
			$style = 'alert_right';
			include 'notice.php';

			$msg = '注册赠送';
			include 'layer.php';
		}
	
	}else{
		include template("reg.html");
	}

?>
