<?php

	include 'common/common.php';
	
	if($_POST['submit']){
		$username=strMagic($_POST['admin_username']);
		$password=trim($_POST['admin_password']);
	
		$result=DBselect('user','uid,username,udertype,picture,grade', 'username="'.$username.'" and password="'.md5($password).'" and udertype=1');
	
		if(!$result){
	
			$msg = '<font color=red><b>登录失败,您不是管理员或用户名、密码错误</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 3000;
			include 'notice.php';
	
		}else{
		
			$_SESSION['uid']=$result[0]['uid'];
			$_SESSION['username']=$result[0]['username'];
			$_SESSION['udertype']=$result[0]['udertype'];
	
			header('location:admin_index.php');
		
		}
	}
	
	include template("admin_login.html");

?>

