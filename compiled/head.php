<div id="hd">
	<div class="wp">
		<div class="hdc cl">
			<h2><a href="./" title="<?php echo $title; ?>"><img src="<?php echo $domain_resource; ?>/images/logo.jpg" height="80" border="0" /></a></h2>
			<?php if($thispage!='logout.php'){?>
				<?php if($_COOKIE['uid']){?>
				<div id="um">
					<div class="avt y"><a href="home_tx.php"><img src="<?php echo $GGpicture; ?>" /></a></div>
					<p>
					<strong class="vwmy"><a href="home.php" target="_blank"><?php echo $_COOKIE['username']; ?></a></strong>
					<span class="pipe">|</span><a href="home.php">设置</a>
					<?php if($_COOKIE['udertype']){?>
					<span class="pipe">|</span><a href="admin.php" target="_blank">管理中心</a>
					<?php }?>
					<span class="pipe">|</span><a href="logout.php">退出</a>
					</p>
					<p>
					<a id="extcreditmenu" href="#">积分: <?php echo $GGgrade; ?></a>
					<span class="pipe">|</span>用户权限: <?php echo userGroup($_COOKIE['udertype']); ?>
					</p>
				</div>
				<?php } else { ?>
				<form method="post" autocomplete="off" id="lsform" action="login.php">
				<div class="fastlg cl">
					<div class="y pns">
						<table cellspacing="0" cellpadding="0">
							<tr>
								<td><span class="ftid">用户名</span></td>
								<td><input type="text" name="username" value="<?php echo $_COOKIE['username']; ?>" id="ls_username" autocomplete="off" class="px vm" /></td>
								<td class="fastlg_l">
									<label for="ls_cookietime"><input type="checkbox" name="cookietime" id="ls_cookietime" class="pc" value="true" />自动登录</label>
								</td>
								<td>&nbsp;<a href="getpass.php">找回密码</a></td>
							</tr>
							<tr>
								<td><label for="ls_password" class="z psw_w">密码</label></td>
								<td><input type="password" name="password" id="ls_password" class="px vm" autocomplete="off" /></td>
								<td class="fastlg_l"><button type="submit" class="pn vm" name="loginsubmit" value="true" style="width:75px;"><em>登录</em></button></td>
								<td>&nbsp;<a href="reg.php" class="xi2 xw1">立即注册</a></td>
							</tr>
						</table>
					</div>
				</div>
				</form>
				<?php }?>
			<?php }?>
		</div>
	
		<div id="nv">
			<ul>	
				<li <?php if(empty($bigId)){?>class="a"<?php }?> id="mn_forum" ><a href="index.php" hidefocus="true" title="<?php echo $web_name; ?>">首页</a><span><?php echo $web_name; ?></span></li>
				<?php if(is_array($headMenu)){foreach($headMenu AS $hmVal) { ?>
				<li <?php if($bigId == $hmVal['cid']){?>class="a"<?php }?> id="mn_home" ><a href="index.php?bigid=<?php echo $hmVal['cid']; ?>" hidefocus="true" title="Space"><?php echo $hmVal['classname']; ?></a></li>
				<?php }}?>
				
			</ul>
		</div>
		
		<div id="scbar" class="cl">
			<form id="scbar_form" method="get" autocomplete="off" action="search.php" target="_blank">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td class="scbar_icon_td"></td>
					<td class="scbar_txt_td"><input type="text" name="keywords" id="scbar_txt" onfocus="if(this.value=='请输入搜索内容'){this.value='';this.style.color='#666';}" onblur="if(this.value==''){this.value='请输入搜索内容';this.style.color='#ccc';}" value="请输入搜索内容" style="color:#CCCCCC" autocomplete="off" /></td>
					<td class="scbar_btn_td">
						<button type="submit" name="searchsubmit" id="scbar_btn" class="pn pnc" value="true"><strong class="xi2 xs2">搜索</strong></button>
					</td>
					<td class="scbar_hot_td">
						<div id="scbar_hot">
							<strong class="xw1">热搜: </strong>
							<?php if(is_array($keyWords)){foreach($keyWords AS $kwVal) { ?>
							<a href="search.php?keywords=<?php echo $kwVal; ?>" target="_blank" class="xi2"><?php echo $kwVal; ?></a>
							<?php }}?>
						</div>
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
</div>
