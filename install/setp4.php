<?php

	include 'top.php';

	if(!empty($_POST['dbsubmitname'])){
	
		$str=file_get_contents('../config/database.php');
		
		foreach($_POST as $key=>$val){
			
			$pattern="/define\('$key','.*?'\);/";
			$replace="define('$key','$val');";
		
			$str=preg_replace($pattern, $replace, $str);

		}
		
		file_put_contents('../config/database.php',$str);

		//执行数据库导入
		include '../config/database.php';
		
		//新建数据库
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
		if(mysqli_get_server_info($link) > '4.1') {
			mysqli_query($link, "CREATE DATABASE IF NOT EXISTS `".DB_NAME."` DEFAULT CHARACTER SET ".DB_CHARSET);
		} else {
			mysqli_query($link, "CREATE DATABASE IF NOT EXISTS `".DB_NAME."`");
		}
		if(mysqli_connect_errno($link)){
			exit('数据库不存在');
		}
		mysqli_close($link);
			
		$sql=file_get_contents('apple_bbs.sql');
		$conn=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_errno($conn)){

			exit(mysqli_error($conn));
		}
		mysqli_set_charset($conn, DB_CHARSET);
		
		$arr=explode(';phpxy;',$sql);

		foreach($arr as $val){
			if(!empty($val))
			{
				$Nval = str_replace('bbs_', DB_PREFIX, $val);
				$result = mysqli_query($conn, $Nval);

				if($result){
						$sql = '<font color="green">数据库导入成功</font>';
				}else{
						$sql = '<font color="red">数据库导入失败</font>';
				}
			}
		}
		
		mysqli_close($conn);
		
	}
	
?>
<div class="container">
	<div class="header">
		<h1>安装向导</h1>
		<span>简体中文 UTF8 版</span>
	<div class="setup step4">
		<h2>安装</h2>
		<p><?php echo $sql; ?>, 输入管理员的账号密码</p>
	</div>
	<div class="stepstat">
		<ul>
			<li class="">检查安装环境</li>
			<li class="">检查文件权限</li>
			<li class="">创建数据库</li>
			<li class="current last">安装</li>
		</ul>
		<div class="stepstatbg stepstat1"></div>
	</div>
	</div>
<div class="main">
<form method="post" action="setp5.php">
<div id="form_items_3" >
<br />
<div class="desc"><b>填写管理员信息</b></div>
<table class="tb2">
<tr><th class="tbopt" align="left">&nbsp;管理员账号:</th>
<td><input type="text" name="username" value="admin" size="35" class="txt"></td>
<td></td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;管理员密码:</th>
<td><input type="password" name="password" value="" size="35" class="txt"></td>
<td>管理员密码不能为空</td>
</tr>

<tr><th class="tbopt" align="left">&nbsp;管理员 Email:</th>
<td><input type="text" name="email" value="" size="35" class="txt"></td>
<td></td>
</tr>
<tr><th class="tbopt" align="left">&nbsp;</th>
<td><input type="submit" name="submitname" value="完成" class="btn"></td>
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

