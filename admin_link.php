<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	//添加
	if(!empty($_POST['addlink'])){
	
		$n='displayorder, name, url, description, logo, addtime';
		$v=''.$_POST['displayorder'].',"'.$_POST['name'].'","'.$_POST['url'].'","'.$_POST['description'].'","'.$_POST['logo'].'",'.time().'';
		$result=DBinsert('link', $n, $v);
		if(!$result){

			$msg = '<font color=red><b>添加失败</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		
		}else{

			header('location:admin_link.php');
			exit;

		}

	}

	//删除
	if(!empty($_POST['dellink'])){
	
		$isdel=$_POST['delete'];
		$Nisdel=join(',',$isdel);
		DBdel('link', 'lid in('.$Nisdel.')');

		header('location:admin_link.php');
		exit;

	}

	//修改
	if(!empty($_POST['editlink'])){

		foreach($_POST['displayorder'] as $key=>$val){
			$result=DBupdate('link', 'displayorder="'.$val.'",name="'.$_POST['name'][$key].'",url="'.$_POST['url'][$key].'",description="'.$_POST['description'][$key].'",logo="'.$_POST['logo'][$key].'"', 'lid='.$key.'');
		}

		header('location:admin_link.php');
		exit;

	}
	
	$textUrl=DBselect('link','*','','displayorder desc,lid desc');

	$title=WEB_NAME." - 管理中心 - 友情链接";
	include template("admin_link.html");

?>
