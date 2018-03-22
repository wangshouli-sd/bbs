<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 公共函数库																							|
 * -------------------------------------------------------------------------------------------------+
 */

	/**
	 * 魔术转译
	 * @param String $data
	 * @return String
	 */
	function strMagic ($data)
	{
		$toLowerData = strtolower(trim($data));
		if(GPC){
			return addslashes($toLowerData);
		}
		return $toLowerData;
	}

	/**
	 * 获取版块中最后的发表内容
	 * @param String $content
	 * @return String
	 */
	function categoryLast($content)
	{
		if(!empty($content)){
			$arr = explode('+||+',$content);
			//7+||+呼吁！请各版版主清理一下各版块！！+||+13810377933+||+yhsong
			$str = '<a href="detail.php?id='.$arr[0].'" class="xi2">'.$arr[1].'</a> ';
			$str .= '<cite>';
			$str .= '<span title="'.formatTime($arr[2]).'">'.getFormatTime($arr[2]).'</span> ';
			$str .= $arr[3];
			$str .= '</cite>';
		}else{
			$str = '从未';
		}
		return $str;
	}
	

	/**
	 * 最后发表
	 * @param String $content
	 * @return String
	 */
	function creatLast($content)
	{
		$arr = explode(',',$content);
		$str = '<cite>'.$arr[2].'</cite>';
		$str .= '<em><span title="'.formatTime($arr[1],false).'">'.getFormatTime($arr[1]).'</span></em>';
		return $str;
	}

	/**
	 * UNIX时间戳格式化为日期
	 * @param time $addTime
	 * @param bool $gs (true, 无 时:分:秒 | false, 有 时:分:秒)
	 * @return Datetime
	 */
	function formatTime($addTime, $gs = true)
	{
		if($gs){
			return date('Y-m-d',$addTime);
		}else{
			return date('Y-m-d H:i:s',$addTime);
		}
	}
	
	/**
	 * 格式化帖子时间, 规则如下:
	 * 如果一小时内，显示分钟，如果大于1小时小于1天显示小时，如果大于天且小于3天，显示天数，否则显示日期时间
	 * @param time $showTime
	 * @return Datetime
	 */
	function getFormatTime($showTime)
	{
		$nowTime = time();	//当前时间
		$dur = $nowTime - $showTime;	//当前时间 - 帖子时间
		if ($dur < 60)
		{
			$overTime = $dur . '秒前';
		} else if ($dur < 3600) {
			$overTime = floor($dur/60) . '分钟前';
		} else if ($dur < 86400) {
			$overTime = floor($dur/3600) . '小时前';
		} else if ($dur < 259200) {//3天内
			$overTime = floor($dur/86400) . '天前';
		} else {
			$overTime = date('Y-m-d H:i:s', $showTime);
		}
		return $overTime;
	}

	/**
	 * 定义楼层
	 * @param Integer $conunt
	 * @return String
	 */
	function storey($count)
	{
		switch($count){
			case 0:
				return '沙发';
				break;
			case 1:
				return '板凳';
				break;
			case 2:
				return '地板';
				break;
			case 3:
				return '地下室';
				break;
			case 4:
				return '地狱';
				break;
			default:
				return '第'.($count+1).'楼';
		}
	}

	/**
	 * 电梯跳转楼层设置
	 * @param Integer $count
	 * @return Integer
	 */
	function setFloor($count)
	{
		return $count+1;
	}

	/**
	 * 字符串标红,$search值可为数组或字符串
	 * @param mixed $search 关键词
	 * @param String $substr 替换源
	 * @return String
	 */
	function strred($search, $substr)
	{
		if(is_array($search)){
			for($i=0; $i<count($search); $i++){
				$substr=str_ireplace($search[$i], '<font color=red>'.$search[$i].'</font>', $substr);
			}
		}else{
			$substr=str_ireplace($search, '<font color=red>'.$search.'</font>', $substr);
		}
		return $substr;
	}

	/**
	 * 截取中文字符
	 * @param String $str
	 * @param Integer $start 从第start个开始
	 * @param Integer $len 共len个
	 * @return String
	 */
	function chineseSubstr($str, $start, $len)
	{
		$strlen = $start+$len;
		$str = strip_tags($str);
		for($i=0; $i<$strlen; $i++)
		{
			if(ord(substr($str,$i,1)) > 0xa0) {
				$newStr .= substr($str,$i,2);
				$i++;
			}else{
				$newStr .= substr($str,$i,1);
			}
		}

		if(strlen($str) > $len) {
			$newStr = $newStr.'...';
		}

		return $newStr;
	}

	/**
	 * 计算终止时间
	 * @param time $timer
	 * @param Integer $day
	 * @return time
	 */
	function overTime($timer, $day)
	{
		$NewDay = $day*60*60*24;
		return $timer + $NewDay;
	}

	/**
	 * 验证是否为整型
	 * @param String $str
	 * @return Boolean
	 */
	function strIsInteger($str)
	{
		if(!empty($str) && ($str==(int)$str)){
			return $str;
		}else{
			return false;
		}
	}
	

