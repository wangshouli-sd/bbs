<?php
/**
 * 首页
 */
	include './common/common.php';

	$title = '首页 - ' . WEB_NAME;
	$menu = WEB_NAME;

	$bigId = strIsInteger($_GET['bigid']);	//大版块ID

	if($bigId){
		//读取指定大版块信息 
		$LTmenu = dbSelect(
			'category',
			'cid,classname',
			'cid='.$bigId.' and ispass=1 and parentid=0',
			'orderby desc,cid desc'
		);
		if(!$LTmenu)
		{
			$msg = '<font color=red><b>无板块分类，请去后台添加～</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 300000;
			include 'notice.php';
			exit;

		}
		//读取指定小版块信息 
		$LTsMenu = dbSelect('category','*','parentid='.$bigId.' and ispass=1','orderby desc,cid desc');
	}else{

		//读取所有大版块信息 
		$LTmenu = dbSelect('category','cid,classname','parentid=0 and ispass=1','orderby desc,cid desc');
		if(!$LTmenu){
		
			$msg = '<font color=red><b>无板块分类，请去后台添加～</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 300000;
			include 'notice.php';
			exit;

		}
		//读取所有小版块信息 
		$LTsMenu = dbSelect('category','*','parentid<>0 and ispass=1','orderby desc,cid desc');
	
	}

	//读取帖子总数
	$motifCount = dbFuncSelect('category','sum(motifcount)','parentid<>0');
	$tzCount = $motifCount['sum(motifcount)'];

	//会员数量
	$userCount = dbFuncSelect('user','count(uid)');
	$userC = $userCount['count(uid)'];

	//最新加入会员
	$newUser = dbSelect('user','username','','uid desc',1);
	$uName = $newUser ? $newUser[0]['username'] : '无';

	//读取图片友情链接
	$imgUrl = dbSelect('link','*','description!="" or logo!=""','displayorder desc,lid desc');

	//读取文字友情链接
	$textUrl = dbSelect('link','*','logo<=>null or logo=""','displayorder desc,lid desc');
	
	include template("index.html");
