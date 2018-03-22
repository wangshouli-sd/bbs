<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	if(!empty($_POST['editsubmit'])){
	
		foreach($_POST['order'] as $key=>$val){
	$result=DBupdate('category', 'orderby='.$val.',classname="'.$_POST['name'][$key].'",compere="'.$_POST['compere'][$key].'"', 'cid='.$key.'');
		}

		header('location:admin_category.php');
		exit;

	}

	//读取所有大版块信息 
	$LTmenu=DBselect('category','cid,classname,orderby','parentid=0 and ispass=1','orderby desc,cid desc');
	//读取所有小版块信息 
	$LTsMenu=DBselect('category','*','parentid<>0 and ispass=1','orderby desc,cid desc');



	$title=WEB_NAME." - 管理中心 - 用户管理 - 版块管理";


	include template("admin_category.html");

?>
