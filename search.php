<?php
/**
 * 注册
 */
	include './common/common.php';
	
	$key = trim($_GET['keywords']);
	if(!$key)
	{
		$msg = '<font color=red><b>没有输入关键词</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
		include 'notice.php';
		exit;
	}

	$arrKey = explode(' ',$key);
	$where = '';
	for($i=0; $i<count($arrKey); $i++)
	{
		if(empty($where))
		{
			$where .= "title like '%$arrKey[$i]%'";
		}else{
			$where .= " or title like '%$arrKey[$i]%'";
		}
	}

	$where = ' and (' . $where . ')';

	$cSearch = dbFuncSelect('details', 'count(id)', 'first=1 and isdel=0 ' . $where);

	$select = 't.id as id,t.authorid as authorid,t.content as content,t.addtime as addtime,t.title as title,t.classid as classid,t.replycount as replycount,t.hits as hits,u.username as username,c.classname as classname';
	$search = dbDuoSelect('details as t','user as u','on t.authorid=u.uid','category as c','on c.cid=t.classid',$select,'first=1 and isdel=0 '.$where.'','id desc');

	$title = $key . '的搜索结果 - ' . WEB_NAME;

	include template("search.html");

?>
