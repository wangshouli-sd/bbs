<?php
/**
 * 注销
 */
	include './common/common.php';

	setcookie('uid','',time()-1);
	setcookie('udertype','',time()-1);
	setcookie('picture','',time()-1);
	setcookie('grade','',time()-1);

	$msg = '<font color=green><b>您已退出站点，现在将以游客身份转入退出前页面</b></font>';
	$url = 'index.php';
	$style = 'alert_right';
	$toTime = 3000;
	include 'notice.php';
