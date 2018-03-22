<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	//恢复主题
	if(!empty($_POST['undelsubmit'])){
	
		foreach($_POST['tidarray'] as $key=>$val){
			
			//恢复主题
			$result=DBupdate('details', 'isdel=0', 'id='.$key.'');

			//再更新该主题所在类别的主题数量
			$results=DBupdate('category', 'motifcount=motifcount+1', 'cid='.$val.'');

		}

		header('location:admin_detail_del.php');
		exit;

	}

	//删除主题
	if(!empty($_POST['delsubmit'])){
	
		foreach($_POST['tidarray'] as $key=>$val){
			//删除主题
			$result=DBdel('details', 'id='.$key.'');
			//删除主题内的回复
			$delresult=DBdel('details', 'tid='.$key.'');
		}

		header('location:admin_detail_del.php');
		exit;

	}

	
	$cSearch = dbFuncSelect('details','count(id)','first=1 and isdel=1');
	//读取版块内帖子信息
	$select='t.id as id,t.authorid as authorid,t.content as content,t.addtime as addtime,t.title as title,t.classid as classid,t.replycount as replycount,t.hits as hits,u.username as username,c.classname as classname';
	$search=DBduoSelect('details as t','user as u','on t.authorid=u.uid','category as c','on c.cid=t.classid',$select,'first=1 and isdel=1','id desc');
	



	$title=WEB_NAME." - 管理中心 - 用户管理 - 帖子管理";


	include template("admin_detail_del.html");

?>
