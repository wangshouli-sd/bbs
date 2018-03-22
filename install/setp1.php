<?php

	include 'top.php';
	
	function userOS(){
	
		//$user_OSagent = $_SERVER['HTTP_USER_AGENT'];
		$user_OSagent = PHP_OS;

		if($user_OSagent)
		{
			$visitor_os = $user_OSagent;
		
		} else {
		
			$visitor_os = '其它';
		
		}
		
		return $visitor_os;
	
	}
	
?>
<div class="container">
	<div class="header">
		<h1>安装向导</h1>
		<span>简体中文 UTF8 版</span>
	<div class="setup step1">
		<h2>开始安装</h2>
		<p>检查安装环境</p>
	</div>
	<div class="stepstat">
		<ul>
			<li class="current">检查安装环境</li>
			<li class="unactivated">检查文件权限</li>
			<li class="unactivated">创建数据库</li>
			<li class="unactivated last">安装</li>
		</ul>
		<div class="stepstatbg stepstat1"></div>
	</div>
	</div>
<div class="main">
<h2 class="title">环境检查</h2>
<table class="tb" style="margin:20px 0 20px 55px;">
<tr>
	<th>项目</th>
	<th class="padleft">所需配置</th>
	<th class="padleft">最佳配置</th>
	<th class="padleft">当前服务器</th>
</tr>
<tr>
<td>操作系统</td>
<td class="padleft">不限制</td>
<td class="padleft">Linux</td>
<td class="w pdleft1"><?php echo userOS() ?></td>
</tr>
<tr>
<td>PHP 版本</td>
<td class="padleft">5.5.x</td>
<td class="padleft">5.5.x</td>
<td class="w pdleft1"><?php echo PHP_VERSION ?></td>
</tr>
</table>
<form action="setp2.php" method="post">
<div class="btnbox marginbot">
	<input type="button" onclick="history.back();" value="上一步">
	<input type="submit" value="下一步">
</div>
</form>
		<?php
			include 'foot.php';
		?>
	</div>
</div>
</body>
</html>

