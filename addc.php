<?php
/**
 * 发帖子
 */

	include './common/common.php';

	//判断用户是否登录
	if(!$_COOKIE['uid'])
	{
		$notice = '抱歉，您尚未登录，没有权限在该版块发帖';
		include 'close.php';
		exit;
	}

	//判断ID是否存在
	if(empty($_REQUEST['classid']) || !is_numeric($_REQUEST['classid']))
	{
		$msg = '<font color=red><b>禁止非法操作</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
	}
	$classId = $_REQUEST['classid'];

	//读取导航索引
	$category = dbSelect('category','cid,classname,parentid','parentid<>0 and cid='.$classId.'','',1);
	if($category){

		$smallName = $category[0]['classname'];
		$smallId = $category[0]['cid'];
		$parentCategory = dbSelect('category','cid,classname','cid='.$category[0]['parentid'].'','',1);
		if($parentCategory)
		{
			$bigName=$parentCategory[0]['classname'];
			$bigId=$parentCategory[0]['cid'];
		}else{
			$msg = '<font color=red><b>非法操作</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
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


	//发布帖子
	if($_POST['topicsubmit'])
	{
		$authorid = $_COOKIE['uid'];		//发布人ID
		$title = strMagic($_POST['subject']);		//标题
		$content = strMagic($_POST['content']);		//内容
		$addtime = time();			//发表时间
		
		if ($_SERVER['REMOTE_ADDR'] == '::1') {
			$addip = ip2long('127.0.0.1');//发布人IP
		} else {
			$addip = ip2long($_SERVER['REMOTE_ADDR']);//发布人IP
		}
		
		$classId = $_POST['classid'];		//类别ID
		$rate = $_POST['price'];			//帖子售价
		
		$n = 'first, authorid, title, content, addtime, addip, classid, rate';
		$v = '1, '.$authorid.', "'.$title.'", "'.$content.'", '.$addtime.', '.$addip.', '.$classId.', '.$rate.'';
		$result = dbInsert('details', $n, $v);
		
		$insert_id = dbSelect('details','id','title="'.$title.'"','id desc',1);
		$insertId = $insert_id[0]['id'];
		if(!$result){

			$msg = '<font color=red><b>帖子发表失败，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		
		}else{

			$money = REWARD_T;	//发帖赠送积分
			$result = dbUpdate('user', "grade=grade+{$money}", 'uid='.$_COOKIE['uid'].'');


			//更新版块表的主题数量[Motifcount](跟帖是回复数量[eplycount])和最后发表[lastpost]
			$last = $insertId.'+||+'.$title.'+||+'.$addtime.'+||+'.$_COOKIE['username'];
			$result = dbUpdate('category', 'motifcount=motifcount+1, lastpost="'.$last.'"', 'cid='.$classId.'');

			$msg = '<font color=red><b>帖子发表成功</b></font>';
			$url = 'detail.php?id='.$insertId;
			$style = 'alert_right';
			$toTime = 3000;
			include 'notice.php';
			
			$msg = '发帖赠送';
			include 'layer.php';
			exit;

		}
	
	}

	$OnMenu = dbSelect('category','cid,classname','cid='.$classId.' and ispass=1','orderby desc,cid desc');
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
	}

	$title = '发表帖子'.$OnCname.' - '.WEB_NAME;
	$menu = WEB_NAME;
	include template("addc.html");

