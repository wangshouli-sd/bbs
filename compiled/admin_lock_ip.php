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
		<div class="itemtitle"><h3>禁止 IP</h3></div>
		<table class="tb tb2 " id="tips">
			<tr>
				<th  class="partition">技巧提示</th>
			</tr>
			<tr>
				<td class="tipsblock" s="1">
					<ul id="tipslis">
						<li>被限制的IP地址不能访问本站。</li>
						<li>有效期如果设置为空则视为永久禁止。</li>
					</ul>
				</td>
			</tr>
		</table>
		<form name="cpform" method="post" autocomplete="off" action="" id="cpform" >
		<table class="tb tb2 ">
			<tr class="header">
				<th></th>
				<th>IP 地址</th>
				<th>起始时间</th>
				<th>终止时间</th>
			</tr>
			<?php if(is_array($IpList)){foreach($IpList AS $key=>$val) { ?>
			<tr class="hover">
				<td><?php echo $key; ?></td>
				<td class="td28"><?php echo long2ip($val['ip']); ?></td>
				<td class="td28"><?php echo formatTime($val['addtime']); ?></td>
				<td class="td28"><?php echo formatTime($val['overtime']); ?></td>
			</tr>
			<?php }}?>
			<tr class="hover">
				<td>新增</td>
				<td class="td28">
				<input type="text" class="txt" name="ip1new" value="" size="3" maxlength="3">.
				<input type="text" class="txt" name="ip2new" value="" size="3" maxlength="3">.
				<input type="text" class="txt" name="ip3new" value="" size="3" maxlength="3">.
				<input type="text" class="txt" name="ip4new" value="" size="3" maxlength="3">
				</td>
				<td class="td28" colspan="2">有效期: <input type="text" class="txt" name="validitynew" value="30" size="3"> 天</td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="fixsel">
						<input type="submit" class="btn" id="submit_ipbansubmit" name="ipbansubmit" title="按 Enter 键可随时提交你的修改" value="提交" />
					</div>
				</td>
			</tr>
		</table>
		</form>
	
	</div>
</BODY>
</HTML>
