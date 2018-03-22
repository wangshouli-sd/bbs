<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	if(!empty($_POST['modsubmit'])){
	
		foreach($_POST['tidarray'] as $key=>$val){

			$nkey=explode(',',$key);
			$result=DBupdate('details', 'isdel=1', 'id='.$nkey[0].'');
			$results=DBupdate('category', 'replycount=replycount-1', 'cid='.$val.'');
			$results=DBupdate('details', 'replycount=replycount-1', 'id='.$nkey[1].'');
		}

		header('location:admin_detail_hf.php');
		exit;

	}


	$cSearch = dbFuncSelect('details','count(id)','first=0 and isdel=0');
	//读取版块内帖子信息
	$select='t.id as id,t.authorid as authorid,t.content as content,t.addtime as addtime,t.tid as tid,t.classid as classid,u.username as username,c.classname as classname';
	$search=DBduoSelect('details as t','user as u','on t.authorid=u.uid','category as c','on c.cid=t.classid',$select,'first=0 and isdel=0','id desc');
	



	$title=WEB_NAME." - 管理中心 - 用户管理 - 帖子管理";


	include template("admin_detail_hf.html");

?>
