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
<div class="container" id="cpcontainer">
	<div class="floattop">
		<div class="itemtitle">
			<h3>编辑用户 - <?php echo $User[0]['username']; ?></h3>
		</div>
	</div>
	<div class="floattopempty"></div>

	<form name="cpform" method="post" autocomplete="off" action="" id="cpform" enctype="multipart/form-data">
	<table class="tb tb2 ">
		<tr><td colspan="2" class="td27" s="1">用户名:</td></tr>
		<tr class="noborder">
			<td class="vtop rowform"><?php echo $User[0]['username']; ?><input type="hidden" name="uid" value="<?php echo $User[0]['uid']; ?>" /></td>
			<td class="vtop tips2" s="1"></td></tr>
		<tr>
			<td colspan="2" class="td27" s="1">头像:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
	 		<img src="<?php echo $User[0]['picture']; ?>" /></td><td class="vtop tips2" s="1"></td>
		</tr>
		<tr>
			<td colspan="2" class="td27" s="1">新密码:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<input name="passwordnew" value="" type="text" class="txt"   />
			</td>
			<td class="vtop tips2" s="1">如果不更改密码此处请留空</td>
		</tr>
		<tr><td colspan="2" class="td27" s="1">清除用户安全提问:</td></tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<ul>
				<li><input class="radio" type="radio" name="clearquestion" value="1" >&nbsp;是</li>
				<li class="checked"><input class="radio" type="radio" name="clearquestion" value="0" checked>&nbsp;否</li>
			</ul>
			</td>
			<td class="vtop tips2" s="1">选择“是”将清除用户安全提问，该用户将不需要回答安全提问即可登录；选择“否”为不改变用户的安全提问设置</td></tr>
			<tr>
				<td colspan="2" class="td27" s="1">锁定当前用户:</td>
			</tr>
			<tr class="noborder">
				<td class="vtop rowform">
				<ul>
					<li><input class="radio" type="radio" name="statusnew" value="1" >&nbsp;是</li>
					<li class="checked"><input class="radio" type="radio" name="statusnew" value="0" checked>&nbsp;否</li>
				</ul>
				</td>
				<td class="vtop tips2" s="1"></td>
			</tr>
		<tr>
			<td colspan="2" class="td27" s="1">Email:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<input name="emailnew" value="<?php echo $User[0]['email']; ?>" type="text" class="txt"   /></td>
			<td class="vtop tips2" s="1"></td>
		</tr>
		<tr>
			<td colspan="2" class="td27" s="1">注册 IP:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<input name="regipnew" value="<?php echo long2ip($User[0]['regip']); ?>" type="text" class="txt"   /></td>
			<td class="vtop tips2" s="1"></td>
		</tr>
		<tr>
			<td colspan="2" class="td27" s="1">注册时间:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<input name="regdatenew" value="<?php echo formatTime($User[0]['regtime'],false); ?>" type="text" class="txt"   /></td>
			<td class="vtop tips2" s="1"></td>
		</tr>
		<tr>
			<td colspan="2" class="td27" s="1">上次访问:</td>
		</tr>
		<tr class="noborder" id="grade">
			<td class="vtop rowform">
			<input name="lastvisitnew" value="<?php echo formatTime($User[0]['lasttime'],false); ?>" type="text" class="txt" /></td>
			<td class="vtop tips2" s="1"></td>
		</tr>

		<tr><th colspan="15" class="partition">积分奖惩</th></tr>
			<tr>
				<td colspan="2" class="td27" s="1">积分:</td>
			</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<input type="text" name="grade" class="px" value="<?php echo $User[0]['grade']; ?>" tabindex="1" />
			</td>
			<td class="vtop tips2" s="1">直接填写积分的奖惩数值，在原有积分基础上加(或减)，惩罚积分请填写负数</td>
		</tr>
		<tr><th colspan="15" class="partition">论坛选项</th></tr>
			<tr>
				<td colspan="2" class="td27" s="1">签名:</td>
			</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<textarea  rows="6" name="signaturenew" id="signaturenew" cols="50" class="tarea"><?php echo $User[0]['autograph']; ?></textarea>
			</td>
			<td class="vtop tips2" s="1"><br /></td>
		</tr>
		<tr><th colspan="15" class="partition">用户栏目</th></tr>
		<tr>
			<td colspan="2" class="td27" s="1">真实姓名:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<input type="text" name="realname" class="px" value="<?php echo $User[0]['realname']; ?>" tabindex="1" /><div class="rq mtn" id="showerror_realname"></div></td>
			<td class="vtop tips2" s="1"></td>
		</tr>
		<tr>
			<td colspan="2" class="td27" s="1">性别:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
				<select name="sex" id="sex" class="ps">
					<option value="0" <?php if($result[0]['sex']==0){?>selected="selected"<?php }?>>保密</option>
					<option value="1" <?php if($result[0]['sex']==1){?>selected="selected"<?php }?>>女</option>
					<option value="2" <?php if($result[0]['sex']==2){?>selected="selected"<?php }?>>男</option>
				</select><div class="rq mtn" id="showerror_gender"></div></td>
			<td class="vtop tips2" s="1"></td>
		</tr>
		<tr>
			<td colspan="2" class="td27" s="1">生日:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
					<select name="birthyear" id="birthyear" class="ps" onchange="showbirthday();">
						<option value="">年</option>
						<?php if(is_array($Yarr)){foreach($Yarr AS $key=>$y) { ?>
						<option value="<?php echo $y; ?>" <?php if($y==$yBirthday){?>selected="selected"<?php }?>><?php echo $y; ?></option>
						<?php }}?>
					</select>&nbsp;
					<select name="birthmonth" id="birthmonth" class="ps">
						<option value="">月</option>
						<?php if(is_array($Marr)){foreach($Marr AS $key=>$m) { ?>
						<option value="<?php echo $m; ?>" <?php if($m==$mBirthday){?>selected="selected"<?php }?>><?php echo $m; ?></option>
						<?php }}?>
					</select>&nbsp;
					<select name="birthday" id="birthday" class="ps">
						<option value="">日</option>
						<?php if(is_array($Darr)){foreach($Darr AS $key=>$d) { ?>
						<option value="<?php echo $d; ?>" <?php if($d==$dBirthday){?>selected="selected"<?php }?>><?php echo $d; ?></option>
						<?php }}?>
					</select><div class="rq mtn" id="showerror_birthday"></div></td>
			<td class="vtop tips2" s="1"></td>
		</tr>
		<tr>
			<td colspan="2" class="td27" s="1">籍贯:</td>
		</tr>
		<tr class="noborder">
			<td class="vtop rowform">
			<p id="birthdistrictbox">
				<select name="place" id="place" class="ps">
					<option value="">-省份-</option>
					<option did="1" value="北京市" <?php if($Jg=='北京市'){?>selected="selected"<?php }?>>北京市</option>
					<option did="2" value="天津市" <?php if($Jg=='天津市'){?>selected="selected"<?php }?>>天津市</option>
					<option did="3" value="河北省" <?php if($Jg=='河北省'){?>selected="selected"<?php }?>>河北省</option>
					<option did="4" value="山西省" <?php if($Jg=='山西省'){?>selected="selected"<?php }?>>山西省</option>
					<option did="5" value="内蒙古自治区" <?php if($Jg=='内蒙古自治区'){?>selected="selected"<?php }?>>内蒙古自治区</option>
					<option did="6" value="辽宁省" <?php if($Jg=='辽宁省'){?>selected="selected"<?php }?>>辽宁省</option>
					<option did="7" value="吉林省" <?php if($Jg=='吉林省'){?>selected="selected"<?php }?>>吉林省</option>
					<option did="8" value="黑龙江省" <?php if($Jg=='黑龙江省'){?>selected="selected"<?php }?>>黑龙江省</option>
					<option did="9" value="上海市" <?php if($Jg=='上海市'){?>selected="selected"<?php }?>>上海市</option>
					<option did="10" value="江苏省" <?php if($Jg=='江苏省'){?>selected="selected"<?php }?>>江苏省</option>
					<option did="11" value="浙江省" <?php if($Jg=='浙江省'){?>selected="selected"<?php }?>>浙江省</option>
					<option did="12" value="安徽省" <?php if($Jg=='安徽省'){?>selected="selected"<?php }?>>安徽省</option>
					<option did="13" value="福建省" <?php if($Jg=='福建省'){?>selected="selected"<?php }?>>福建省</option>
					<option did="14" value="江西省" <?php if($Jg=='江西省'){?>selected="selected"<?php }?>>江西省</option>
					<option did="15" value="山东省" <?php if($Jg=='山东省'){?>selected="selected"<?php }?>>山东省</option>
					<option did="16" value="河南省" <?php if($Jg=='河南省'){?>selected="selected"<?php }?>>河南省</option>
					<option did="17" value="湖北省" <?php if($Jg=='湖北省'){?>selected="selected"<?php }?>>湖北省</option>
					<option did="18" value="湖南省" <?php if($Jg=='湖南省'){?>selected="selected"<?php }?>>湖南省</option>
					<option did="19" value="广东省" <?php if($Jg=='广东省'){?>selected="selected"<?php }?>>广东省</option>
					<option did="20" value="广西壮族自治区" <?php if($Jg=='广西壮族自治区'){?>selected="selected"<?php }?>>广西壮族自治区</option>
					<option did="21" value="海南省" <?php if($Jg=='海南省'){?>selected="selected"<?php }?>>海南省</option>
					<option did="22" value="重庆市" <?php if($Jg=='重庆市'){?>selected="selected"<?php }?>>重庆市</option>
					<option did="23" value="四川省" <?php if($Jg=='四川省'){?>selected="selected"<?php }?>>四川省</option>
					<option did="24" value="贵州省" <?php if($Jg=='贵州省'){?>selected="selected"<?php }?>>贵州省</option>
					<option did="25" value="云南省" <?php if($Jg=='云南省'){?>selected="selected"<?php }?>>云南省</option>
					<option did="26" value="西藏自治区" <?php if($Jg=='西藏自治区'){?>selected="selected"<?php }?>>西藏自治区</option>
					<option did="27" value="陕西省" <?php if($Jg=='陕西省'){?>selected="selected"<?php }?>>陕西省</option>
					<option did="28" value="甘肃省" <?php if($Jg=='甘肃省'){?>selected="selected"<?php }?>>甘肃省</option>
					<option did="29" value="青海省" <?php if($Jg=='青海省'){?>selected="selected"<?php }?>>青海省</option>
					<option did="30" value="宁夏回族自治区" <?php if($Jg=='宁夏回族自治区'){?>selected="selected"<?php }?>>宁夏回族自治区</option>
					<option did="31" value="新疆维吾尔自治区" <?php if($Jg=='新疆维吾尔自治区'){?>selected="selected"<?php }?>>新疆维吾尔自治区</option>
					<option did="32" value="台湾省" <?php if($Jg=='台湾省'){?>selected="selected"<?php }?>>台湾省</option>
					<option did="33" value="香港特别行政区" <?php if($Jg=='香港特别行政区'){?>selected="selected"<?php }?>>香港特别行政区</option>
					<option did="34" value="澳门特别行政区" <?php if($Jg=='澳门特别行政区'){?>selected="selected"<?php }?>>澳门特别行政区</option>
					<option did="35" value="海外" <?php if($Jg=='海外'){?>selected="selected"<?php }?>>海外</option>
					<option did="36" value="其他" <?php if($Jg=='其他'){?>selected="selected"<?php }?>>其他</option>
				</select>
			&nbsp;</p><div class="rq mtn" id="showerror_birthcity"></div></td><td class="vtop tips2" s="1"></td></tr>
		<tr>
			<td colspan="15">
				<div class="fixsel"><input type="submit" class="btn" id="submit_editsubmit" name="editsubmit" title="按 Enter 键可随时提交你的修改" value="提交" /></div>
			</td>
		</tr>
	</table>
	</form>
	
	</div>
</BODY>
</HTML>
