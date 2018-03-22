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
		<div class="itemtitle"><h3>站点信息</h3></div>
		<form name="cpform" method="post" autocomplete="off" action="" id="cpform" >
			<table class="tb tb2 ">
				<tr>
					<td colspan="2" class="td27" s="1">站点名称:</td>
				</tr>
				<tr class="noborder">
					<td class="vtop rowform">
					<input name="WEB_NAME" value="<?php echo $web_name; ?>" type="text" class="txt"   />
					</td>
					<td class="vtop tips2" s="1">
					站点名称，将显示在浏览器窗口标题等位置
					</td>
				</tr>
				<tr>
					<td colspan="2" class="td27" s="1">网站名称:</td>
				</tr>
				<tr class="noborder">
					<td class="vtop rowform">
					<input name="WEB_BTM" value="<?php echo $web_btm; ?>" type="text" class="txt"   />
					</td>
					<td class="vtop tips2" s="1">网站名称，将显示在页面底部的联系方式处</td>
				</tr>
				<tr>
					<td colspan="2" class="td27" s="1">网站 URL:</td>
				</tr>
				<tr class="noborder">
					<td class="vtop rowform">
					<input name="WEB_URL" value="<?php echo $web_url; ?>" type="text" class="txt"   />
					</td>
					<td class="vtop tips2" s="1">网站 URL，将作为链接显示在页面底部</td>
				</tr>
				<tr>
					<td colspan="2" class="td27" s="1">网站备案信息代码:</td>
				</tr>
				<tr class="noborder">
					<td class="vtop rowform">
					<input name="WEB_ICP" value="<?php echo $web_icp; ?>" type="text" class="txt"   />
					</td>
					<td class="vtop tips2" s="1">页面底部可以显示 ICP 备案信息，如果网站已备案，在此输入你的授权码，它将显示在页面底部，如果没有请留空</td>
				</tr>
			</table>
		
			<table class="tb tb2 ">
				<tr>
					<th colspan="15" class="partition">关闭站点</th>
				</tr>
				<tr>
					<td colspan="2" class="td27" s="1">关闭站点:</td>
				</tr>
				<tr class="noborder">
					<td class="vtop rowform">
					<ul>
						<li>
							<input class="radio" type="radio" name="WEB_ISCLOSE" value="true" <?php if($web_close==true){?>checked<?php }?>>&nbsp;是
						</li>
						<li class="checked">
							<input class="radio" type="radio" name="WEB_ISCLOSE" value="false" <?php if($web_close==false){?>checked<?php }?>>&nbsp;否
						</li>
					</ul>
					</td>
					<td class="vtop tips2" s="1">暂时将站点关闭，其他人无法访问，但不影响管理员访问</td>
				</tr>
				<tr>
					<td colspan="15">
						<div class="fixsel"><input type="submit" class="btn" id="submit_settingsubmit" name="settingsubmit" title="按 Enter 键可随时提交你的修改" value="提交" /></div>
					</td>
				</tr>
			</table>
		</form>
	
	</div>
</BODY>
</HTML>
