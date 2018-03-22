<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	if(!empty($_POST['addsubmit'])){
	
		$n='classname, parentid';
		$v='"'.$_POST['classname'].'","'.$_POST['parentid'].'"';
		$result=DBinsert('category', $n, $v);
		if(!$result){

			$msg = '<font color=red><b>版块添加失败</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		
		}else{

			header('location:admin_category.php');
			exit;

		}	

	}

	//读取所有大版块信息 
	$LTmenu=DBselect('category','cid,classname,orderby','parentid=0 and ispass=1','orderby desc,cid desc');

	$title=WEB_NAME." - 管理中心 - 用户管理 - 添加版块";


	include template("admin_category_add.html");

?>
