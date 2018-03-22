<?php include template("header.html");?>
<!--TOP start-->
<?php include template("top.html");?>
<!--TOP end-->

<!--HEAD start-->
<?php include template("head.html");?>
<!--HEAD end-->

<!--CONTENT start-->
<div id="wp" class="wp">
	<div id="pt" class="bm cl">
		<div class="z">
			<a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">论坛</a><?php if($bigid){?><em>&raquo;</em><a href="index.php?bigid=<?php echo $LTmenu[0]['cid']; ?>"><?php echo $LTmenu[0]['classname']; ?></a><?php }?>
		</div>
		<div class="z"></div>
	</div>

	<div id="ct" class="wp cl">
		<div id="chart" class="bm bw0 cl">
			<div class="y">
				<p class="chart z">
				帖子: <em><?php echo $tzCount; ?></em><span class="pipe">|</span>
				会员: <em><?php echo $userC; ?></em><span class="pipe">|</span>
				欢迎新会员: <em><?php echo $uName; ?></em>
				</p>
			</div>
		</div>
	
		<div class="mn">
			<?php if($bigid){?>
			<div class="fl bm">
				<!--板块 start-->
				<div class="bm bmw  cl">
					<div class="bm_h cl">
						<h2><a href="index.php?bigid=<?php echo $LTmenu[0]['cid']; ?>"><?php echo $LTmenu[0]['classname']; ?></a></h2>
					</div>
					<div id="category_1" class="bm_c">
						<table cellspacing="0" cellpadding="0" class="fl_tb">
							<?php if(is_array($LTsMenu)){foreach($LTsMenu AS $key=>$val) { ?>
							<tr <?php if($key!=0){?> class="fl_row"<?php }?>>
								<td class="fl_icn" >
									<a href="list.php?classid=<?php echo $val['cid']; ?>"><img src="<?php echo $val['classpic']; ?>" alt="<?php echo $val['classname']; ?>" /></a>
								</td>
								<td>
									<h2><a href="list.php?classid=<?php echo $val['cid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['classname']; ?></a></h2>
									<p class="xg2"><?php echo $val['description']; ?></p>
									<?php if(!empty($val['compere'])){?>
									<p>版主: <span class="xi2"><?php echo getUserName($val['compere']); ?></span></p>
									<?php }?>
								</td>
								<td class="fl_i">
									<span class="xi2"><?php echo $val['replycount']; ?></span><span class="xg1"> / <?php echo $val['motifcount']; ?></span>
								</td>
								<td class="fl_by">
									<div>
										<?php echo categoryLast($val['lastpost']); ?>
									</div>
								</td>
							</tr>
							<?php }}?>
						</table>
					</div>
				</div>
				<!--板块 end-->
			</div>
			<?php } else { ?>
			<div class="fl bm">
				<!--板块 start-->
				<?php if(is_array($LTmenu)){foreach($LTmenu AS $inde=>$bk) { ?>
				<div class="bm bmw  cl">
					<div class="bm_h cl">
						<h2><a href="index.php?bigid=<?php echo $bk['cid']; ?>"><?php echo $bk['classname']; ?></a></h2>
					</div>
					<div id="category_1" class="bm_c">
						<table cellspacing="0" cellpadding="0" class="fl_tb">
							<?php if(is_array($LTsMenu)){foreach($LTsMenu AS $key=>$val) { ?>
							<?php if($val['parentid']==$bk['cid']){?>
							<tr <?php if($key!=0 && $key!=2){?>class="fl_row"<?php }?>>
								<td class="fl_icn" >
									<a href="list.php?classid=<?php echo $val['cid']; ?>"><img src="<?php echo $val['classpic']; ?>" alt="<?php echo $val['classname']; ?>" /></a>
								</td>
								<td>
									<h2><a href="list.php?classid=<?php echo $val['cid']; ?>" style="color:<?php echo $val['namestyle']; ?>"><?php echo $val['classname']; ?></a></h2>
									<p class="xg2"><?php echo $val['description']; ?></p>
									<?php if(!empty($val['compere'])){?>
									<p>版主: <span class="xi2"><?php echo getUserName($val['compere']); ?></span></p>
									<?php }?>
								</td>
								<td class="fl_i">
									<span class="xi2"><?php echo $val['replycount']; ?></span><span class="xg1"> / <?php echo $val['motifcount']; ?></span>
								</td>
								<td class="fl_by">
									<div>
									<?php echo categoryLast($val['lastpost']); ?>
									</div>
								</td>
							</tr>
							<?php }?>
							<?php }}?>
						</table>
					</div>
				</div>
				<?php }}?>
				<!--板块 end-->
			</div>
			<?php }?>
			<!--<div id="online" class="bm oll">
				<div class="bm_h">
					<h3>
						<strong><a href="#">在线会员</a></strong>
						<span class="xs1">- <strong>1</strong> 人在线 - <strong>1</strong> 会员(<strong>0</strong> 隐身),
						<strong>0</strong> 位游客 - 最高记录是 <strong>4</strong> 于 <strong>2012-4-17</strong>.</span>
					</h3>
				</div>
				<dl id="onlinelist" class="bm_c">
					<dt class="ptm pbm bbda">
						<img src="<?php echo $domain_resource; ?>/images/online_admin.gif" /> 管理员 &nbsp; &nbsp; &nbsp; 
						<img src="<?php echo $domain_resource; ?>/images/online_supermod.gif" /> 超级版主 &nbsp; &nbsp; &nbsp; 
						<img src="<?php echo $domain_resource; ?>/images/online_moderator.gif" /> 版主 &nbsp; &nbsp; &nbsp; 
						<img src="<?php echo $domain_resource; ?>/images/online_member.gif" /> 会员 &nbsp; &nbsp; &nbsp; 
					</dt>
					<dd class="ptm pbm">
						<ul class="cl">
							<li title="时间: 20:44">
								<img src="<?php echo $domain_resource; ?>/images/online_admin.gif" alt="icon" />
								<a href="#">admin</a>
							</li>
						</ul>
					</dd>
				</dl>
			</div>-->
			<div class="bm lk">
				<div id="category_lk" class="bm_c ptm">
					<ul class="m mbn cl">
						<?php if(is_array($imgUrl)){foreach($imgUrl AS $index=>$iurl) { ?>
						<li class="lk_logo mbm bbda cl">
							<img src="<?php echo $iurl['logo']; ?>" border="0" alt="<?php echo $iurl['name']; ?>" />
							<div class="lk_content z">
								<h5><a href="<?php echo $iurl['url']; ?>" target="_blank"><?php echo $iurl['name']; ?></a></h5>
								<p><?php echo $iurl['description']; ?></p>
							</div>
						<?php }}?>
					</ul>
					
					<ul class="x mbm cl">
						<?php if(is_array($textUrl)){foreach($textUrl AS $tindex=>$turl) { ?>
						<li><a href="<?php echo $turl['url']; ?>" target="_blank" title="<?php echo $turl['name']; ?>"><?php echo $turl['name']; ?></a></li>
						<?php }}?>
					</ul>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
<!--CONTENT end-->

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
</body>
</html>

