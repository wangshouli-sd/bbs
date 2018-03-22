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
			<a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">论坛</a><em>&raquo;</em><a href="index.php?bigid=<?php echo $bigId; ?>"><?php echo $bigName; ?></a><em>&raquo;</em><a href="list.php?classid=<?php echo $smallId; ?>"><?php echo $smallName; ?></a>
			</div>
	</div>
	<div class="boardnav">
		<div id="ct" class="wp cl" style="margin-left:145px">
			<div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
				<div class="tbn" id="forumleftside"><h2 class="bdl_h">版块导航</h2>
					<?php if(is_array($LTmenu)){foreach($LTmenu AS $inde=>$bk) { ?>
					<dl class="a" id="lf_<?php echo $bk['cid']; ?>">
						<dt><a href="javascript:;" title="<?php echo $bk['classname']; ?>"><?php echo $bk['classname']; ?></a></dt>
						<?php if(is_array($LTsMenu)){foreach($LTsMenu AS $key=>$val) { ?>
						<?php if($val['parentid']==$bk['cid']){?>
						<dd <?php if($val['cid']==$OnCid){?>class="bdl_a"<?php }?>>
						<a href="list.php?classid=<?php echo $val['cid']; ?>" title="<?php echo $val['classname']; ?>"><?php echo $val['classname']; ?></a>
						</dd>
						<?php }?>
						<?php }}?>
					</dl>
					<?php }}?>
				</div>
			</div>
			
			<div class="mn">
			
				<div class="bm bml pbn">
					<div class="bm_h cl">
					<h1 class="xs2">
					<a href="list.php?classid=<?php echo $OnCid; ?>"><?php echo $OnCname; ?></a>
					<span class="xs1 xw0 i">今日: <strong class="xi1"><?php echo $JCount; ?></strong><span class="pipe">|</span>主题: <strong class="xi1"><?php echo $zCount; ?></strong></span></h1>
					</div>
					<?php if(!empty($compere)){?>
					<div class="bm_c cl pbn">
						
						<div>
							版主: <span class="xi2"><?php echo getUserName($compere); ?></span>
						</div>
						
					</div>
					<?php }?>
				</div>
				
				<div id="pgt" class="bm bw0 pgs cl">
				<span class="pgb y"  ><a href="index.php">返&nbsp;回</a></span>
				<a href="addc.php?classid=<?php echo $OnCid; ?>" id="newspecial" title="发新帖"><img src="<?php echo $domain_resource; ?>/images/pn_post.png" alt="发新帖" /></a></div>
				
				<div id="threadlist" class="tl bm bmw">
				<div class="th">
				<table cellspacing="0" cellpadding="0">
				<tr>
				<th colspan="2">
				<div class="tf">
				筛选:
				<a href="list.php?classid=<?php echo $classId; ?>" class="xi2">全部</a><span class="pipe">|</span><a href="list.php?classid=<?php echo $classId; ?>&elite=1" class="xi2">精华</a></div>
				</th>
				<td class="by">作者</td>
				<td class="num">回复/查看</td>
				<td class="by">最后发表</td>
				</tr>
				</table>
				</div>
				<div class="bm_c">
				<form method="post" autocomplete="off" name="moderate" id="moderate" action="">
				<table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
					<?php if(is_array($ListContent)){foreach($ListContent AS $key=>$val) { ?>
						<tr>
							<td class="icn">
							<a href="detail.php?id=<?php echo $val['id']; ?>" title="<?php if($val['addtime']>$newt){?>有新回复 - <?php }?>新窗口打开" target="_blank"><img src="<?php echo $domain_resource; ?>/images/folder_<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>.gif" /></a>
							</td>
							<th class="<?php if($val['addtime']>$newt){?>new<?php } else { ?>common<?php }?>">
							 <a href="detail.php?id=<?php echo $val['id']; ?>" class="xst"  <?php if(!empty($val['style'])){?>style="color:<?php echo $val['style']; ?>"<?php }?>><?php echo $val['title']; ?></a>
							 <?php if($val['rate']){?>
							 - [售价 <span class="xw1"><?php echo $val['rate']; ?></span> 金钱]
							 <?php }?>
							 <?php if($val['elite']){?>
							 <img src="<?php echo $domain_resource; ?>/images/digest_1.gif" align="absmiddle" alt="digest" title="精华帖" />
							 <?php }?>
							 <?php if($val['addtime']>$newt){?>
							 <a href="detail.php?id=<?php echo $val['id']; ?>#lastpost" class="xi1">New</a>
							 <?php }?>
							</th>
							<td class="by">
							<cite><?php echo getUserName($val['authorid']); ?></cite>
							<em><span class="xi1"><?php echo formatTime($val['addtime']); ?></span></em>
							</td>
							<td class="num"><a href="detail.php?id=<?php echo $val['id']; ?>" class="xi2"><?php echo $val['replycount']; ?></a><em><?php echo $val['hits']; ?></em></td>
							<td class="by">
							<?php echo creatLast(getListUName($val['id'])); ?>
							</td>
						</tr>
					<?php }}?>
				</table>
				</form>
				</div>
				</div>
				
				<div class="bm bw0 pgs cl">
				<span  class="pgb y"><a href="index.php">返&nbsp;回</a></span>
				<a href="addc.php?classid=<?php echo $OnCid; ?>" id="newspecialtmp" title="发新帖"><img src="<?php echo $domain_resource; ?>/images/pn_post.png" alt="发新帖" /></a></div>
				<div style="width:800px; margin:0 auto; padding:10px 0px; text-align:right">
				<?php echo fpage($zCount,$linum,[8,3,4,5,6,7,0,1,2]); ?>
				</div>
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

