<?php

	include 'top.php';
	
?>
<div class="container">
	<div class="header">
		<h1>安装向导</h1>
		<span>简体中文 UTF8 版</span>
	<div class="setup step3">
		<h2>创建数据库</h2>
		<p>正在执行数据库安装</p>
	</div>
	<div class="stepstat">
		<ul>
			<li class="">检查安装环境</li>
			<li class="">检查文件权限</li>
			<li class="current">创建数据库</li>
			<li class="unactivated last">安装</li>
		</ul>
		<div class="stepstatbg stepstat1"></div>
	</div>
	</div>
<div class="main">
<form method="post" action="setp4.php">
<div id="form_items_3" >
<br />
<div class="desc"><b>填写数据库信息</b></div>
<table class="tb2">
<tr><th class="tbopt" align="left">&nbsp;数据库服务器:</th>
<td><input type="text" name="DB_HOST" value="localhost" size="35" class="txt"></td>
<td>数据库服务器地址, 一般为 localhost</td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;数据库名:</th>
<td><input type="text" name="DB_NAME" value="apple_bbs" size="35" class="txt"></td>
<td></td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;数据库用户名:</th>
<td><input type="text" name="DB_USER" value="root" size="35" class="txt"></td>
<td></td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;数据库密码:</th>
<td><input type="text" name="DB_PASS" value="" size="35" class="txt"></td>
<td></td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;数据表前缀:</th>
<td><input type="text" name="DB_PREFIX" value="bbs_" size="35" class="txt"></td>
<td>同一数据库运行多个论坛时，请修改前缀</td>
</tr>
<tr><th class="tbopt" align="left">&nbsp;</th>
<td><input type="submit" name="dbsubmitname" value="下一步" class="btn"></td>
<td></td>
</tr>
</table>
</div>
</form>

		<?php
			include 'foot.php';
		?>
	</div>
</div>
</body>
</html>

