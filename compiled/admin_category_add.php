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
		<div class="itemtitle"><h3>添加版块</h3></div>
		<form name="cpform" method="post" autocomplete="off" action="" id="cpform" >
		<table class="tb tb2 ">
			<tr><th  class="partition" colspan="4">技巧提示</th></tr>
			<tr><td class="tipsblock" s="1" colspan="4">
				<ul id="tipslis">
					<li>添加时不选择大版块即为添加大版块</li>
				</ul>
				</td>
			</tr>
			<tr class="hover">
				<td width="60">版块名称</td>
				<td width="160"><input size="25" name="classname" type="text" value="" /></td>
			</tr>
			<tr class="hover">
				<td width="60">选择大版块</td>
				<td>
                        <select name="parentid">
							<option value="0" >-不选择-</option>
							<?php if(is_array($LTmenu)){foreach($LTmenu AS $bigk=>$bigv) { ?>
							<option value="<?php echo $bigv['cid']; ?>" ><?php echo $bigv['classname']; ?></option>
							<?php }}?>
						</select>
                        <input type="submit" class="btn" id="submit_editsubmit" name="addsubmit" title="按 Enter 键可随时提交你的修改" value="提交" />
				</td>
			</tr>
		</table>
		</form>
	
	</div>
</BODY>
</HTML>
