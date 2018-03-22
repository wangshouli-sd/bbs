<?php
/**
 * 版块列表
 */
	include './common/common.php';

	//判断ID是否存在
	if(empty($_GET['classid']) || !is_numeric($_GET['classid']))
	{
		$msg = '<font color=red><b>禁止非法操作</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	}else{
		$classId = $_GET['classid'];
	}
	//读取精华帖子
	if(!empty($_GET['elite']))
	{
		$condition = ' and elite=1';
	}
	
	//读取导航索引
	$category = dbSelect('category','cid,classname,parentid','parentid<>0 and cid='.$classId.'','',1);
	if($category)
	{
		$smallName = $category[0]['classname'];
		$smallId = $category[0]['cid'];
		$parentCategory = dbSelect('category','cid,classname','cid='.$category[0]['parentid'].'','',1);
		if($parentCategory)
		{
			$bigName = $parentCategory[0]['classname'];
			$bigId = $parentCategory[0]['cid'];
		}else{
			$msg = '<font color=red><b>非法操作</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style='alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		}
	
	}else{

		$msg = '<font color=red><b>非法操作</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	}


	$OnMenu = dbSelect('category','cid,classname,compere','cid='.$classId.' and ispass=1','orderby desc,cid desc');
	if(!$OnMenu)
	{	
		$msg = '<font color=red><b>没有找到该版块</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
	}else{
		$OnCid = $OnMenu[0]['cid'];
		$OnCname = $OnMenu[0]['classname'];
		$compere = $OnMenu[0]['compere'];
	}

	//读取所有大版块信息
	$LTmenu = dbSelect('category','cid,classname','parentid=0 and ispass=1','orderby desc,cid desc');
	//读取所有小版块信息 
	$LTsMenu = dbSelect('category','cid,classname,parentid','parentid<>0 and ispass=1','orderby desc,cid desc');
	
	
	//该版块下的主题数量 
	$TZCount = dbFuncSelect('details','count(id)','first=1 and isdel=0 and classid='.$classId.' '.$condition.'');
	$zCount = $TZCount['count(id)'];

	$linum = 10;	//每页显示数量

	//读取版块内帖子信息
	$ListContent = dbSelect('details','id,title,authorid,addtime,replycount,hits,elite,rate,style','first=1 and isdel=0 and classid='.$classId.' '.$condition.'','istop desc,id desc', setLimit($linum));
	
	//该板块下今日主题数量
	$newt = time()-1000;
	$start_time = strtotime(date('Y-m-d',time()));
	$JRCount = dbFuncSelect('details','count(id)','first=1 and isdel=0 and (addtime>='.$start_time.'  and addtime<='.time().')');
	$JCount = $JRCount['count(id)'];

	$title = $OnCname.' - '.WEB_NAME;
	$menu = WEB_NAME;
	include template("list.html");
