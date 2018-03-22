<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=ie=7 http-equiv=x-ua-compatible>
<LINK rel=stylesheet type=text/css href="<?php echo $domain_resource; ?>/admin/admincp.css">
<META name=GENERATOR content="MSHTML 8.00.6001.19120"></HEAD>
<BODY>
<SCRIPT type=text/JavaScript>
var admincpfilename = 'admin_index.php', IMGDIR = '<?php echo $domain_resource; ?>/images', STYLEID = '1', VERHASH = 'pFT', IN_ADMINCP = true, ISFRAME = 1, STATICURL='<?php echo $domain_resource; ?>/', SITEURL = '', JSPATH = '<?php echo $domain_resource; ?>/js/';
</SCRIPT>
<SCRIPT type=text/javascript src="js/common.js"></SCRIPT>
<SCRIPT type=text/javascript src="js/admincp.js"></SCRIPT>
<SCRIPT type=text/javascript>
if(ISFRAME && !parent.document.getElementById('leftmenu')) {
	redirect(admincpfilename + '?frames=yes&' + document.URL.substr(document.URL.indexOf(admincpfilename) + 10));
}
</SCRIPT>

	<div id="append_parent"></div>
	<div class="container" id="cpcontainer">
		<script type="text/JavaScript">parent.document.title = '<?php echo $title; ?>';</script>
		<div class="itemtitle"><h3>帖子管理</h3></div>
		<form name="cpform" method="post" autocomplete="off" action="" id="cpform">
		<table class="tb tb2 ">
			<tr><th colspan="15" class="partition">主题数：<?php echo $cSearch['count(id)']; ?></th></tr>
			<tr class="header">
				<th></th>
				<th>回复内容</th>
				<th>版块</th>
				<th>作者</th>
			</tr>
			<?php if(is_array($search)){foreach($search AS $key=>$val) { ?>
			<tr class="hover">
				<td class="td25"><input class="checkbox" type="checkbox" name="tidarray[<?php echo $val['id']; ?>,<?php echo $val['tid']; ?>]" value="<?php echo $val['classid']; ?>" /></td>
				<td><a href="detail.php?id=<?php echo $val['tid']; ?>" target="_blank"><?php echo chineseSubstr($val['content'],0,101); ?></a></td>
				<td><a href="list.php?classid=<?php echo $val['classid']; ?>" target="_blank"><?php echo $val['classname']; ?></a></td>
				<td class="td28"><?php echo $val['username']; ?><br /><em style="font-size:9px;color:#999999;"><?php echo formatTime($val['addtime']); ?></em></td>
			</tr>
			<?php }}?>
			<tr>
				<td colspan="15">
				<div class="fixsel">
				<input type="submit" class="btn" name="delsubmit" value="删除主题" />&nbsp;<input type="submit" class="btn" name="undelsubmit" value="恢复主题" />
				</div>
				</td>
			</tr>
		</table>
		</form>
	
	</div>
</BODY>
</HTML>
