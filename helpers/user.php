<?php

	//获取用户名
	function getUserName($uid)
	{
		$UserName = DBselect('user','uid,username','uid in('.$uid.')','uid desc');
		foreach($UserName as $val)
		{
			$str[]=$val['username'];
		}
		//var_dump($str);
		//exit;
		$nstr=join(', ',$str);
		return $nstr;
	}

	//获取最后发表用户的用户名和回复时间
	function getListUName($tid)
	{
		//查看帖子是否存在回复内容
		$huifu = DBselect('details','id,authorid,addtime','tid='.$tid.' or id='.$tid.'','id desc',1);

		if($huifu)
		{
			//返回作者、回复内容ID、回复的时间
			$UserName = DBselect('user','uid,username','uid='.$huifu[0]['authorid'].'','uid desc',1);
			return $huifu[0]['id'].','.$huifu[0]['addtime'].','.$UserName[0]['username'];
		}
		return false;
	}

	/**
	 * 检测用户名和密码长度
	 * @param String $str
	 * @param Intiger $minLen
	 * @param Intiger $maxLen
	 * @return Boolean
	 */
	function stringLen($str, $minLen = 3, $maxLen = 12)
	{
		$strLen = mb_strlen($str);

		if($strLen >= $minLen && $strLen <= $maxLen){
			return false;
		}else{
			return true;
		}
	}
	
	/**
	 * 检测两次密码输入是否一致
	 * @param String $str1
	 * @param String $str2
	 * @return Boolean
	 */
	function str2Equal($str1, $str2)
	{
		if($str1 == $str2){
			return false;
		}else{
			return true;
		}
	}
	
	//检测邮箱格式
	function checkEmail($mail)
	{
		$pattern='/^[\w-]+@([a-zA-Z0-9-]+\.)+((com)|(cn)|(net)|(edu))$/i';
		if(preg_match($pattern, $mail))
		{
			return false;
		}else{
			return true;
		}
	}

	//检测验证码
	function checkVerify($str, $sessionVerify)
	{
		if(strtolower($str)!=strtolower($sessionVerify))
		{
			return true;
		}else{
			return false;
		}
	}

	//获得客户端IP地址
	function getIntIP()
	{
		return ip2long($_SERVER['REMOTE_ADDR']);
	}

	//用户等级
	function userGrade($jifen)
	{
		if($jifen<=50){
			echo '学士';
		}elseif($jifen<=100){
			echo '硕士';
		}elseif($jifen<=200){
			echo '博士';
		}elseif($jifen<=300){
			echo '院士';
		}else{
			echo '圣斗士';
		}
	}

	//用户权限组
	function userGroup($ugroup)
	{
		switch($ugroup){
			case 1:
				echo '管理员';
				break;
			case 0:
				echo '普通用户';
				break;
			default:
				echo '普通用户';
		}
	}
