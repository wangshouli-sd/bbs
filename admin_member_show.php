<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	if(empty($_REQUEST['id']) || !is_numeric($_REQUEST['id'])){

		$msg = '<font color=red><b>禁止非法操作</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style='alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;

	}
	$Id=$_REQUEST['id'];

	//修改用户信息
	if(!empty($_POST['editsubmit'])){
	
		
		$passwordnew=trim($_POST['passwordnew']);
		if(empty($passwordnew)){
			$set='';
		}else{
			$set='password="'.md5($passwordnew).'",';
		}
		$clearquestion=$_POST['clearquestion'];
		if($clearquestion){
			$set.='problem="",result="",';
		}
		$allowlogin=$_POST['statusnew'];
		if($allowlogin){
			$set.='allowlogin=1,';
		}
		$email=$_POST['emailnew'];
		$set.='email="'.$email.'",';

		$grade=trim($_POST['grade']);
		$set.='grade=grade+'.$grade.',';

		$autograph=strMagic($_POST['signaturenew']);
		$set.='autograph="'.$autograph.'",';

		$realname=$_POST['realname'];
		$sex=$_POST['sex'];
		$birth=$_POST['birthyear'].'-'.$_POST['birthmonth'].'-'.$_POST['birthday'];
		$place=$_POST['place'];
		$set.='realname="'.$realname.'",sex='.$sex.',birthday="'.$birth.'",place="'.$place.'"';
		echo $set;
		exit;
		$owner=DBupdate('user', $set, 'uid='.$_POST['uid'].'');
		if($owner){

			header('location:admin_member_show.php');

		}else{

			$msg = '<font color=red><b>错误，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		
		}

	}

	//会员数量
	$userCount=DBfuncSelect('user','count(uid)');
	$userC=$userCount['count(uid)'];

	//读取会员信息
	$User=DBselect('user','*','uid='.$Id.'','',1);

	if(!$User){

		$msg = '<font color=red><b>用户不存在</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style='alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	
	}
	$Jg=$User[0]['place'];
	if(!empty($User[0]['birthday'])){

		$Barr=explode('-',$User[0]['birthday']);
		$Ybirthday=$Barr[0];
		$Mbirthday=$Barr[1];
		$Dbirthday=$Barr[2];
	
	}else{

		$Ybirthday='';
		$Mbirthday='';
		$Dbirthday='';
	
	}

	$Yarr=array();
	$Yn=date('Y');
	for($i=0; $i<100; $i++){
		$Yarr[]=$Yn-$i;
	}

	$Marr=array();
	$Mn=1;
	for($i=0; $i<12; $i++){
		$Marr[]=$Mn+$i;
	}

	$Darr=array();
	$Dn=1;
	for($i=0; $i<30; $i++){
		$Darr[]=$Dn+$i;
	}


	$title=WEB_NAME." - 管理中心 - 用户管理 - 编辑用户";


	include template("admin_member_show.html");

?>
