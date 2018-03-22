<?php
/**
 * 帖子详情
 */

	include './common/common.php';

	//判断帖子ID是否存在
	if(empty($_REQUEST['id']) || !is_numeric($_REQUEST['id']))
	{
		$msg = '<font color=red><b>禁止非法操作</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
	}
	$Id=$_REQUEST['id'];

	//保存帖子回复
	if($_POST['replysubmit'])
	{
		//判断用户是否登录
		if(!$_COOKIE['uid']){

			$notice='抱歉，您尚未登录';
			include 'close.php';
			exit;
		}
		
		$tid = $Id;					//跟帖时记录贴子ID
		$authorid = $_COOKIE['uid'];			//发布人ID
		$content = strMagic($_POST['message']);		//内容
		$addtime = time();				//发表时间
		if ($_SERVER['REMOTE_ADDR'] == '::1') {
			$addip = ip2long('127.0.0.1');//发布人IP
		} else {
			$addip = ip2long($_SERVER['REMOTE_ADDR']);//发布人IP
		}
		$classId = $_POST['classid'];			//类别ID
		
		$n='first, tid, authorid, content, addtime, addip, classid';
		$v='0, '.$tid.', '.$authorid.', "'.$content.'", '.$addtime.', '.$addip.', '.$classId.'';
		$result = dbInsert('details', $n, $v);

		if(!$result)
		{
			$msg = '<font color=red><b>回复失败，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'notice.php';
			exit;
		}else{
			$money = REWARD_H;	//回帖赠送积分
			$result = dbUpdate('user', "grade=grade+{$money}", 'uid='.$_COOKIE['uid'].'');
			
			//更新帖子的回复数量[replycount]
			$result = dbUpdate('details', 'replycount=replycount+1', 'id='.$tid.'');

			//更新版块表的回复数量[replycount]
			$result = dbUpdate('category', 'replycount=replycount+1', 'cid='.$classId.'');
			//header('location:detail.php?id='.$Id);
			$msg = '<font color=red><b>帖子回复成功</b></font>';
			$url = 'detail.php?id='.$Id;
			$style = 'alert_right';
			$toTime = 3000;
			include 'notice.php';

			$msg = '回帖赠送';
			include 'layer.php';

			exit;

		}
	
	}


	//点击帖子时访问次数加1
	$result = dbUpdate('details', 'hits=hits+1', 'id='.$Id.' and isdel=0 and first=1');
	if(!$result)
	{
		$msg = '<font color=red><b>您浏览的帖子不存在或已被删除</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
	}
	
	//读取帖子信息
	$TiZi = dbSelect('details','*','id='.$Id.' and isdel=0 and first=1','',1);
	$authorid = $TiZi[0]['authorid'];		//作者ID
	$Title = $TiZi[0]['title'];		//标题
	$Content = $TiZi[0]['content'];		//内容
	$Addtime = getFormatTime($TiZi[0]['addtime']);		//发布时间
	$classId = $TiZi[0]['classid'];		//版块ID
	$Replycount = $TiZi[0]['replycount'];	//回复数量
	$Hits = $TiZi[0]['hits'];			//点击数量
	$Elite = $TiZi[0]['elite'];		//精华
	$Rate = $TiZi[0]['rate'];			//所需积分数量

	//读取上一条
	$top = dbSelect('details','id','id>'.$Id.' and isdel=0 and first=1','id desc',1);
	if($top)
	{
		$topid=$top[0]['id'];
	}else{
		$topid=false;
	}
	//读取下一条
	$down = dbSelect('details','id','id<'.$Id.' and isdel=0 and first=1','id desc',1);
	if($down){
		$downid = $down[0]['id'];
	}else{
		$downid = false;
	}

	//读取导航索引
	$category = dbSelect('category','cid,classname,parentid,compere','parentid<>0 and cid='.$classId.'','',1);
	if($category)
	{
		$smallName = $category[0]['classname'];
		$smallId = $category[0]['cid'];
		$BanZhu = $category[0]['compere'];
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

	//读取会员信息
	$User = dbSelect('user','username,email,udertype,regtime,lasttime,picture,autograph,grade','uid='.$authorid.'','',1);
	if($User)
	{
		$U_sername = $User[0]['username'];
		$E_mail = $User[0]['email'];
		$U_dertype = $User[0]['udertype'];
		$R_egtime = formatTime($User[0]['regtime'],false);
		$L_asttime = formatTime($User[0]['lasttime'],false);
		$P_icture = $User[0]['picture'];
		$A_utograph = $User[0]['autograph'];
		$G_rade = $User[0]['grade'];
	}
	
	//该主题下的所有回复数量 
	$TZCount = dbFuncSelect('details','count(id)','tid='.$Id.' and isdel=0 and first=0');
	$zCount = $TZCount['count(id)'];
	$linum = 10;
	$Lpage = empty($_GET['page'])?1:$_GET['page'];
	//循环帖子回复信息
	$select = 't.id as id,t.isdisplay as isdisplay,t.authorid as authorid,t.content as content,t.addtime as addtime,t.addip as addip,t.isdel as isdel,t.elite as elite,u.username as username,u.email as email,u.udertype as udertype,u.regtime as regtime,u.lasttime as lasttime,u.picture as picture,u.autograph as autograph,u.grade as grade';
	$HTiZi = dbDuoSelect('details as t','user as u',' on t.authorid=u.uid',null,null,$select,'t.tid='.$Id.' and t.isdel=0 and t.first=0','t.id asc', setLimit($linum));

	$title = $Title.' - '.WEB_NAME;
	$ggg = 'iPhone 游戏软件分享区';

	
	//查找版主或管理员
	$NBanZhu = explode(',',$BanZhu);
	if(in_array($_COOKIE['uid'], $NBanZhu))
	{
		$GuanLi=true;
	}else{
		if($_COOKIE['udertype'])
		{
			$GuanLi=true;
		}
	}

	//给帖子付款
	if(!empty($_POST['paysubmit']))
	{
		//判断用户是否登录
		if(!$_COOKIE['uid'])
		{
			$notice='抱歉，您尚未登录';
			include 'close.php';
			exit;
		}

		foreach($_POST['oidarr'] as $key=>$val)
		{
			$nval=explode(',',$val);
			//将order表中的ispay更新为1
			$res = dbUpdate('order', 'ispay=1', 'oid='.$key.'');
			//扣钱
			$res = dbUpdate('user', 'grade=grade-'.$nval[1].'', 'uid='.$_COOKIE['uid'].'');
			//给作者加钱
			$res = dbUpdate('user', 'grade=grade+'.$nval[1].'', 'uid='.$nval[0].'');
		}
		header('location:detail.php?id='.$Id);
		exit;

	}
	
	//删除未购买的帖子
	if(!empty($_POST['delsubmit']))
	{
		//判断用户是否登录
		if(!$_COOKIE['uid'])
		{
			$notice='抱歉，您尚未登录';
			include 'close.php';
			exit;
		}
		$arrOid = array_keys($_POST['oidarr']);
		$NarrOid = join(',',$arrOid);
		$result = dbDel('order', 'oid in('.$NarrOid.')');
		header('location:detail.php?id='.$Id);
		exit;

	}

	//购买帖子,点击及加入订单表
	if(!empty($_GET['pay']))
	{
		//判断用户是否登录
		if(!$_COOKIE['uid'])
		{
			$notice='抱歉，您尚未登录';
			include 'close.php';
			exit;
		}

		//查询订单表中是否有这个购买记录
		$select = 't.title as title,t.authorid as authorid,o.oid as oid,o.tid as tid,o.uid as uid,o.rate as rate';
		$IsOrder = dbDuoSelect('order as o','details as t',' on o.tid=t.id',null,null,$select,'o.uid='.$_COOKIE['uid'].' and t.id='.$Id.'','o.oid asc',1);
		if(!$IsOrder)
		{
			//如果没有购买记录，加入订单表
			$Oresult = dbInsert('order', 'uid,tid,rate,addtime,ispay', $_COOKIE['uid'].','.$Id.','.$Rate.','.time().',0');
		}

		//读取这个用户还没有付款的记录
		$OrderList = dbDuoSelect('order as o','details as t',' on o.tid=t.id',null,null,$select,'o.uid='.$_COOKIE['uid'].' and o.ispay=0','o.oid asc');
		$allpay = dbFuncSelect('order','sum(rate ) as zpay','uid='.$_COOKIE['uid'].' and ispay=0');
	
	}

	//检查当前浏览用户是否已付费
	$MyOrder = dbSelect('order','*','uid='.$_COOKIE['uid'].' and ispay=1 and tid='.$Id.'','oid asc',1);

	if($GuanLi){
		//删除，放入回收站
		if(!empty($_GET['del'])){
			
			$result = dbUpdate('details', "isdel=1", 'id='.$Id.'');
			header('location:index.php');
	
		}
		//置顶
		if(!empty($_GET['istop'])){
			$result = dbUpdate('details', "istop=1", 'id='.$Id.'');
			header('location:detail.php?id='.$Id);
		}
		//高亮
		if(!empty($_GET['style'])){
			$result = dbUpdate('details', "style='red'", 'id='.$Id.'');
			header('location:detail.php?id='.$Id);
		}
		//精华
		if(!empty($_GET['elite'])){
			$result = dbUpdate('details', "elite=1", 'id='.$Id.'');
			header('location:detail.php?id='.$Id);
		}
		//删除回帖，放入回收站
		if(!empty($_GET['delht'])){
			
			$result = dbUpdate('details', "isdel=1", 'id='.$_GET['hid'].'');
			header('location:detail.php?id='.$Id);
	
		}
		//回帖置顶
		if(!empty($_GET['istopht'])){
			$result = dbUpdate('details', "istop=1", 'id='.$_GET['hid'].'');
			header('location:detail.php?id='.$Id);
		}
		//回帖屏蔽
		if(!empty($_GET['isdislpay'])){
			$result = dbUpdate('details', "isdisplay=1", 'id='.$_GET['hid'].'');
			header('location:detail.php?id='.$Id);
		}
	}

	include template("detail.html");
	