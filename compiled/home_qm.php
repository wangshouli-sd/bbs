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
			<a href="./" class="nvhm" title="首页"><?php echo $title; ?></a> <em>&rsaquo;</em><a href="home.php">设置</a> <em>&rsaquo;</em>个人签名
		</div>
	</div>
	<div id="ct" class="ct2_a wp cl">
		<div class="mn">
		<div class="bm bw0">
			<h1 class="mt">个人签名</h1>
		<ul class="tb cl">
			<li class="a"><a href="home.php">个人签名</a></li>
		</ul>
		<form action="" method="post" autocomplete="off">
		<table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
			<tr>
				<td>
					<script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
					<script src="public/ckeditor/sample.js" type="text/javascript"></script>
					<textarea  class="ckeditor"  name="content"  id="editor1"><?php echo $result[0]['autograph']; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
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
					<li><a href="home.php">个人资料</a></li>
					<li class="a"><a href="home_qm.php">个人签名</a></li>
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

