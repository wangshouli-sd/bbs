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
		<div class="itemtitle"><h3>版块管理</h3></div>
<form name="cpform" method="post" autocomplete="off" action="" id="cpform" >

<table class="tb tb2 ">
	<tr class="header">
		<th>显示顺序</th>
		<th>版块名称</th>
		<th>版主</th>
	</tr>
	<?php if(is_array($LTmenu)){foreach($LTmenu AS $bigk=>$bigv) { ?>
	<tr class="hover">
		<td class="td25"><input type="text" class="txt" name="order[<?php echo $bigv['cid']; ?>]" value="<?php echo $bigv['orderby']; ?>" /></td>
		<td><div class="parentboard"><input type="text" name="name[<?php echo $bigv['cid']; ?>]" value="<?php echo $bigv['classname']; ?>" class="txt" /></div></td>
		<td class="td23"></td>
	</tr>
	<tbody id="group_1">
		<?php if(is_array($LTsMenu)){foreach($LTsMenu AS $key=>$val) { ?>
		<?php if($val['parentid']==$bigv['cid']){?>
		<tr class="hover">
			<td class="td25"><input type="text" class="txt" name="order[<?php echo $val['cid']; ?>]" value="<?php echo $val['orderby']; ?>" /></td>
			<td><div class="board"><input type="text" name="name[<?php echo $val['cid']; ?>]" value="<?php echo $val['classname']; ?>" class="txt" /></div></td>
			<td class="td23"><input type="text" name="compere[<?php echo $val['cid']; ?>]" value="<?php echo $val['compere']; ?>" class="txt" /></td>
		</tr>
		<?php }?>
		<?php }}?>
	</tbody>
	<?php }}?>
	<tr>
		<td colspan="3">
		<div class="fixsel"><input type="submit" class="btn" id="submit_editsubmit" name="editsubmit" title="按 Enter 键可随时提交你的修改" value="提交" /></div>
		</td>
	</tr>
</table>
</form>
	
	</div>
</BODY>
</HTML>
