<?php

	//包含公共文件
	include 'common/common.php';

	$_SESSION['uid']='';
	$_SESSION['username']='';
	$_SESSION['udertype']='';

	session_destroy();

	$msg = '<font color=green><b>您已成功退出后台</b></font>';
	$url = 'admin.php';
	$style='alert_right';
	$toTime = 3000;
	include 'notice.php';
	exit;

?>
