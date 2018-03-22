<?php

	include 'top.php';
	
	function iswriteable($file){
		if(is_dir($file)){
			$dir=$file;
			if($fp = fopen("$dir/test.txt", 'w')) {
				fclose($fp);
				unlink("$dir/test.txt");
				$writeable = 1;
			}else{
				$writeable = 0;
			}
		}else{
			if($fp = fopen($file, 'a+')) {
				fclose($fp);
				$writeable = 1;
			}else {
				$writeable = 0;
			}
		}
		return $writeable;
	}

?>
<div class="container">
	<div class="header">
		<h1>安装向导</h1>
		<span>简体中文 UTF8 版</span>
	<div class="setup step2">
		<h2>检查文件权限</h2>
		<p>文件目录权限检查</p>
	</div>
	<div class="stepstat">
		<ul>
			<li class="">检查安装环境</li>
			<li class="current">检查文件权限</li>
			<li class="unactivated">创建数据库</li>
			<li class="unactivated last">安装</li>
		</ul>
		<div class="stepstatbg stepstat1"></div>
	</div>
	</div>
<div class="main">
<h2 class="title">目录、文件权限检查</h2>
<table class="tb" style="margin:20px 0 20px 55px;width:90%;">
	<tr>
		<th>目录文件</th>
		<th class="padleft">所需状态</th>
		<th class="padleft">当前状态</th>
	</tr>
	<tr>
		<td>./compiled</td><td class="w pdleft1">可写</td>
		<?php if(iswriteable('../compiled')){ ?>
		<td class="w pdleft1">支持</td>
		<?php }else{ ?>
		<td class="nw pdleft1">不支持</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./theme</td><td class="w pdleft1">可写</td>
		<?php if(iswriteable('../theme')){ ?>
		<td class="w pdleft1">支持</td>
		<?php }else{ ?>
		<td class="nw pdleft1">不支持</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./upload</td><td class="w pdleft1">可写</td>
		<?php if(iswriteable('../upload')){ ?>
		<td class="w pdleft1">支持</td>
		<?php }else{ ?>
		<td class="nw pdleft1">不支持</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./config/config.php</td><td class="w pdleft1">可写</td>
		<?php if(is_writable('../config/config.php')){ ?>
		<td class="w pdleft1">支持</td>
		<?php }else{ ?>
		<td class="nw pdleft1">不支持</td>
		<?php } ?>
	</tr>
	<tr>
		<td>./config/database.php</td><td class="w pdleft1">可写</td>
		<?php if(is_writable('../config/database.php')){ ?>
		<td class="w pdleft1">支持</td>
		<?php }else{ ?>
		<td class="nw pdleft1">不支持</td>
		<?php } ?>
	</tr>
</table>
<h2 class="title">函数依赖性检查</h2>
<table class="tb" style="margin:20px 0 20px 55px;width:90%;">
	<tr>
		<th>函数名称</th>
		<th class="padleft">检查结果</th>
		<th class="padleft"></th>
	</tr>
	<tr>
		<td>mysqli_connect()</td>
		<?php if(function_exists('mysqli_connect')){ ?>
		<td class="w pdleft1">支持</td>
		<?php }else{ ?>
		<td class="nw pdleft1">不支持</td>
		<?php } ?>
		<td class="padleft"></td>
	</tr>
	<tr>
		<td>file_get_contents()</td>
		<?php if(function_exists('file_get_contents')){ ?>
		<td class="w pdleft1">支持</td>
		<?php }else{ ?>
		<td class="nw pdleft1">不支持</td>
		<?php } ?>
		<td class="padleft"></td>
	</tr>
</table>
<form action="setp3.php" method="post">
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

