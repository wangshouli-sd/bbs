<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--LIST start-->
<div id="wp" class="wp">
	<div id="pt" class="bm cl">
		<div class="z">
			<a href="./" class="nvhm" title="首页"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">设置</a> <em>&rsaquo;</em>个人资料
		</div>
	</div>
	<div id="ct" class="ct2_a wp cl">
		<div class="mn">
		<div class="bm bw0">
			<h1 class="mt">个人资料</h1>
		<ul class="tb cl">
			<li class="a"><a href="home.php">基本资料</a></li>
		</ul>
		<form action="home.php" method="post" autocomplete="off">
		<table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
			<tr>
				<th>用户名</th>
				<td><?php echo $_COOKIE['username']; ?></td>
			</tr>
			<tr id="tr_realname">
				<th id="th_realname">真实姓名</th>
				<td id="td_realname">
					<input type="text" name="realname" class="px" value="<?php echo $result[0]['realname']; ?>" />
				</td>
			</tr>
			<tr id="tr_gender">
				<th id="th_gender">性别</th>
				<td id="td_gender">
					<select name="sex" id="sex" class="ps">
						<option value="0" <?php if($result[0]['sex']==0){?>selected="selected"<?php }?>>保密</option>
						<option value="1" <?php if($result[0]['sex']==1){?>selected="selected"<?php }?>>女</option>
						<option value="2" <?php if($result[0]['sex']==2){?>selected="selected"<?php }?>>男</option>
					</select>
				</td>
			</tr>
			<tr id="tr_birthday">
				<th id="th_birthday">生日</th>
				<td id="td_birthday">
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
					</select>
				</td>
			</tr>
			<tr id="tr_birthcity">
				<th id="th_birthcity">籍贯</th>
				<td id="td_birthcity">
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
					</p>
				</td>
			</tr>
			<tr id="tr_realname">
				<th id="th_realname">QQ号码</th>
				<td id="td_realname">
					<input type="text" name="qq" class="px" value="<?php echo $result[0]['qq']; ?>" />
				</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td colspan="2">
					<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true" class="pn pnc" /><strong>保存</strong></button>
				</td>
			</tr>
		</table>
		</form>
		</div>
		</div>
	
		<div class="appl">
			<div class="tbn">
				<h2 class="mt bbda">设置</h2>
				<ul>
					<li><a href="home_tx.php">修改头像</a></li>
					<li class="a"><a href="home.php">个人资料</a></li>
					<li><a href="home_qm.php">个人签名</a></li>
					<li><a href="home_pass.php">密码安全</a></li>
					<!--<li><a href="home_sc.php">收藏管理</a></li>-->
				</ul>
			</div>
		</div>
	</div>
</div>
<!--LIST end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

