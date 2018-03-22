<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	if(!empty($_POST['submit'])){

			$ids = implode(',',$_POST['uidarray']);
			var_dump($ids);
			exit;
			$lock=DBupdate('user', 'allowlogin='.$L.'', 'uid='.$_GET['id'].'');
			header('location:admin_member.php');


	}

	if(!empty($_GET['lock'])){

		//锁定用户
		if($_GET['lock']=='j'){

			$L=0;

		}else{

			$L=1;

		}
		$lock=DBupdate('user', 'allowlogin='.$L.'', 'uid='.$_GET['id'].'');
		header('location:admin_member.php');

	}

	//会员数量
	$userCount=DBfuncSelect('user','count(uid)');
	$userC=$userCount['count(uid)'];

	//会员列表
	$UserList=DBselect('user','uid,username,grade,udertype,regtime,allowlogin','','uid desc');


	$title=WEB_NAME." - 管理中心 - 用户管理 - 编辑用户";


	include template("admin_member.html");

?>
