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
			<a href="./" class="nvhm" title="首页"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">设置</a> <em>&rsaquo;</em>修改头像
		</div>
	</div>
	<div id="ct" class="ct2_a wp cl">
		<div class="mn">
		<div class="bm bw0">
		<p class="bbda pbm mbm">您必须填写旧密码才能修改下面的资料</p>
		<form action="" method="post" autocomplete="off">
			<table summary="个人资料" cellspacing="0" cellpadding="0" class="tfm">
			<tr>
			<th><span class="rq" title="必填">*</span>旧密码</th>
			<td><input type="password" name="oldpassword" id="oldpassword" class="px" /></td>
			</tr>
			<tr>
			<th>新密码</th>
			<td>
			<input type="password" name="newpassword" id="newpassword" class="px" />
			<p class="d">如不需要更改密码，此处请留空 </p>
			</td>
			</tr>
			<tr>
			<th>确认新密码</th>
			<td>
			<input type="password" name="newpassword2" id="newpassword2"class="px" />
			<p class="d">如不需要更改密码，此处请留空 </p>
			</td>
			</tr>
			<tr id="contact">
			<th>Email</th>
			<td>
			<input type="text" name="emailnew" id="emailnew" value="<?php echo $result[0]['email']; ?>" class="px" />
			<p class="d">取回密码时使用</p>
			</td>
			</tr>
			
			<tr>
			<th>安全提问</th>
			<td>
			<select name="questionidnew" id="questionidnew">
				<option selected>保持原有的安全提问和答案</option>
				<option <?php if($result[0]['problem']=='无安全提问'){?>selected<?php }?>>无安全提问</option>
				<option <?php if($result[0]['problem']=='母亲的名字'){?>selected<?php }?>>母亲的名字</option>
				<option <?php if($result[0]['problem']=='爷爷的名字'){?>selected<?php }?>>爷爷的名字</option>
				<option <?php if($result[0]['problem']=='父亲出生的城市'){?>selected<?php }?>>父亲出生的城市</option>
				<option <?php if($result[0]['problem']=='您其中一位老师的名字'){?>selected<?php }?>>您其中一位老师的名字</option>
				<option <?php if($result[0]['problem']=='您个人计算机的型号'){?>selected<?php }?>>您个人计算机的型号</option>
				<option <?php if($result[0]['problem']=='您最喜欢的餐馆名称'){?>selected<?php }?>>您最喜欢的餐馆名称</option>
				<option <?php if($result[0]['problem']=='驾驶执照最后四位数字'){?>selected<?php }?>>驾驶执照最后四位数字</option>
			</select>
			<p class="d">如果您启用安全提问，登录时需填入相应的项目才能登录 </p>
			</td>
			</tr>
			
			<tr>
			<th>回答</th>
			<td>
			<input type="text" name="answernew" id="answernew" value="<?php echo $result[0]['result']; ?>" class="px" />
			<p class="d">如您设置新的安全提问，请在此输入答案 </p>
			</td>
			</tr>
			<tr>
			<th>&nbsp;</th>
			<td><button type="submit" name="pwdsubmit" value="true" class="pn pnc" /><strong>保存</strong></button></td>
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
					<li><a href="home.php">个人资料</a></li>
					<li><a href="home_qm.php">个人签名</a></li>
					<li class="a"><a href="home_pass.php">密码安全</a></li>
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

