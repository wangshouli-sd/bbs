<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 公共文件                                                                                          |
 * -------------------------------------------------------------------------------------------------+
 */

	error_reporting(E_ALL & ~E_NOTICE);
	header('content-type:text/html; charset=utf-8;');

	//项目安装
	if(!file_exists('install.lock'))
	{
		header('location:install/index.php');
		exit;
	}
	
	/**
	 * 加载文件
	 */
	include 'config/database.php';		//加载数据库配置文件
	include 'config/config.php';			//加载站点基础配置文件
	// include 'config/notice.php';			//加载消息文件
	include 'helpers/mytpl.php';			//加载模板函数文件
	include 'helpers/mysql.php';			//加载数据库操作函数文件
	include 'helpers/user.php';          	//加载数据库操作函数文件
	include 'helpers/func.php';          	//加载公共函数文件
	include 'helpers/img.php';           	//加载图片处理函数文件
	include 'helpers/fileupload.php';       //加载文件上传函数文件
	include 'helpers/code.php';           	//加载图片验证码函数文件
	include 'helpers/page.php';          	//加载分页函数文件
	$keyWords = include 'helpers/keywords.php';          	//加载热搜关键词文件

	session_start();						//启动 SESSION

	//初始化变量
	$web_name = WEB_NAME;
	$web_btm = WEB_BTM;
	$web_url = WEB_URL;
	$web_icp = WEB_ICP;
	$web_close = WEB_ISCLOSE;
	$web_reg = WEB_REG;
	$domain_resource = DOMAIN_RESOURCE;

	//获取当前页面地址
	$fileName = explode('/',$_SERVER["PHP_SELF"]);
	$thispage = array_pop($fileName);

	//网站关闭，管理员可以登录
	if(empty($_POST['loginsubmit']))
	{
		if($web_close && !$_COOKIE['udertype'] && $thispage!='logout.php')
		{
			echo $web_close.'---'.$_COOKIE['udertype'].'---'.$thispage;
			include 'close.php';
			exit;
		}
	}

	//禁止IP
	$Uip = ip2long($_SERVER['REMOTE_ADDR']);
	$ip = dbSelect('closeip','*','ip='.$Uip.'','id desc',1);
	if ($ip)
	{
		exit('本站不欢迎你，请离开！');
	}

	if ($_COOKIE['uid'])
	{
		$GGUser = dbSelect('user', 'grade,picture', 'uid=' . $_COOKIE['uid'], '', 1);
		if ($GGUser)
		{
			$GGgrade = $GGUser[0]['grade'];
			$GGpicture = $GGUser[0]['picture'];
		}
	}

	//读取所有大版块信息,做导航
	$headMenu = dbSelect('category','cid,classname','parentid=0 and ispass=1','orderby desc,cid desc');
