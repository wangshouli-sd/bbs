<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/search.css" />
	</head>

<body>
	<div id="toptb" class="cl">
		<div class="z">
			<a href="./" class="showmenu xi2">返回首页</a>
		</div>
		<div class="y">
			<?php if($_COOKIE['uid']){?>
			<strong><a href="#" target="_blank"><?php echo $_COOKIE['username']; ?></a></strong>
			<a href="#">设置</a>
			<a href="loginout.php">退出</a>
			<?php } else { ?>
			<a href="index.php">登录</a>
			<a href="reg.php">立即注册</a>
			<?php }?>
		</div>
	</div>

	<div id="ct" class="cl w">
		<div class="mw">
			<form class="searchform" method="get" autocomplete="off" action="search.php">
			<table id="scform" class="mbm" cellspacing="0" cellpadding="0">
				<tr>
					<td><h1><a href="index.php"><img src="<?php echo $domain_resource; ?>/images/logo.png" alt="Discuz! Board" /></a></h1></td>
					<td>
						<table id="scform_form" cellspacing="0" cellpadding="0">
							<tr>
								<td class="td_srchtxt">
									<input type="text" id="scform_srchtxt" name="srchtxt" size="45" maxlength="40" value="<?php echo $key; ?>" tabindex="1" />
								</td>
								<td class="td_srchbtn">
									<button type="submit" id="scform_submit" class="schbtn"><strong>搜索</strong></button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
		
			<div class="tl">
				<div class="sttl mbn">
					<h2>结果: <em>找到 “<span class="emfont"><?php echo $key; ?></span>” 相关内容 <?php echo $cSearch['count(id)']; ?> 个</em></h2>
				</div>
				<?php if($search){?>
				<div class="slst mtw" id="threadlist"  style="position: relative;">
					<ul>
						<?php if(is_array($search)){foreach($search AS $key=>$val) { ?>
						<li class="pbw" id="2">
							<h3 class="xs3"><a href="detail.php?id=<?php echo $val['id']; ?>" target="_blank" ><strong><?php echo strred($arrKey,$val['title']); ?></a></h3>
							<p class="xg1"><?php echo $val['replycount']; ?> 个回复 - <?php echo $val['hits']; ?> 次查看</p>
							<p>
								<?php echo strred($arrKey,chineseSubstr($val['content'],0,301)); ?>
							</p>
							<p>
								<span><?php echo formatTime($val['addtime'],false); ?></span> - <span><?php echo $val['username']; ?></span>
								 -
								<span><a href="list.php?classid=<?php echo $val['classid']; ?>" target="_blank" class="xi1"><?php echo $val['classname']; ?></a></span>
							</p>
						</li>
						<?php }}?>
					</ul>
				</div>
				<?php } else { ?>
				<p class="emp xs2 xg2">对不起，没有找到匹配结果。</p>
				<?php }?>
			</div>
		</div>
	</div>

	<div id="ft" class="w cl">
		<em>Powered by <strong><a href="<?php echo $web_url; ?>" target="_blank"><?php echo $web_btm; ?></a></strong> <em>V2</em></em> &nbsp;
		<em>&copy; 2012 <a href="<?php echo $web_url; ?>" target="_blank"><?php echo $web_btm; ?> Inc.</a></em>
	</div>
</body>
</html>