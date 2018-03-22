<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	if(!empty($_POST['ipbansubmit'])){
	
		$addip=trim($_POST['ip1new']).'.'.trim($_POST['ip2new']).'.'.trim($_POST['ip3new']).'.'.trim($_POST['ip4new']);
		$addip=ip2long($addip);
		$validitynew=$_POST['validitynew'];
		$timenew=time();
		$overtime=overTime($timenew,$validitynew);

		$n='ip, addtime, overtime';
		$v="{$addip}, {$timenew}, {$overtime}";
		$result=DBinsert('closeip', $n, $v);

		if(!$result){

			$msg = '<font color=red><b>添加失败</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		
		}else{

			header('location:admin_lock_ip.php');
			exit;
		
		}

	}

	//IP列表
	$IpList=DBselect('closeip','*','','id desc');



	$title=WEB_NAME." - 管理中心 - 用户管理 - 禁止IP";


	include template("admin_lock_ip.html");

?>
