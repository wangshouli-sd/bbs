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
			<a href="./" class="nvhm" title="<?php echo $title; ?>"><?php echo $title; ?></a><em>&raquo;</em><a href="index.php">论坛</a><em>&raquo;</em><a href="index.php?bigid=<?php echo $bigId; ?>"><?php echo $bigName; ?></a><em>&raquo;</em><a href="list.php?classid=<?php echo $smallId; ?>"><?php echo $smallName; ?></a><em>&raquo;</em><a href="detail.php?id=<?php echo $Id; ?>"><?php echo $Title; ?></a>
		</div>
		<div class="z"></div>
	</div>


	<div id="ct" class="wp cl">
		<div id="pgt" class="pgs mbm cl pbm bbs">
			<div class="pgt"></div>
			<span class="y pgb" id="visitedforums"><a href="list.php?classid=<?php echo $classId; ?>">返回列表</a></span>
			<a id="newspecial" href="addc.php?classid=<?php echo $classId; ?>" target="_blank" title="发新帖"><img src="<?php echo $domain_resource; ?>/images/pn_post.png" alt="发新帖" /></a>
			<a id="post_reply" href="#f_pst" title="回复"><img src="<?php echo $domain_resource; ?>/images/pn_reply.png" alt="回复" /></a>
		</div>
		<?php if($GuanLi){?>
		<div id="modmenu" class="xi2 pbm">
			<a href="detail.php?id=<?php echo $Id; ?>&del=1">删除主题</a><span class="pipe">|</span>
			<a href="detail.php?id=<?php echo $Id; ?>&istop=1">置顶</a><span class="pipe">|</span>
			<a href="detail.php?id=<?php echo $Id; ?>&style=1">高亮</a><span class="pipe">|</span>
			<a href="detail.php?id=<?php echo $Id; ?>&elite=1">精华</a><span class="pipe">|</span>
		</div>
		<?php }?>
		<div id="postlist" class="pl bm">
			<!--楼主 START-->
			<?php if($Lpage==1){?>
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td class="pls ptm pbm">
						<div class="hm">
							<span class="xg1">查看:</span> <span class="xi1"><?php echo $Hits; ?></span><span class="pipe">|</span><span class="xg1">回复:</span> <span class="xi1"><?php echo $Replycount; ?></span>
						</div>
					</td>
					<td class="plc ptm pbn">
						<div class="y">
							<?php if($topid){?>
							<a href="detail.php?id=<?php echo $topid; ?>" title="上一主题"><img src="<?php echo $domain_resource; ?>/images/thread-prev.png" alt="上一主题" class="vm" /></a>
							<?php }?>
							<?php if($downid){?>
							<a href="detail.php?id=<?php echo $downid; ?>" title="下一主题"><img src="<?php echo $domain_resource; ?>/images/thread-next.png" alt="下一主题" class="vm" /></a>
							<?php }?>
						</div>
						<h1 class="ts">
							<?php echo $Title; ?>
						</h1>
					</td>
				</tr>
			</table>
			<style>
			.max_pic{max-width:120px;}
			</style>
			<div id="post_<?php echo $Id; ?>">
				<table id="pid<?php echo $Id; ?>" cellspacing="0" cellpadding="0">
					<tr>
						<td class="pls" rowspan="2">
							<div class="pi">
								<div class="authi"><a href="#" target="_blank" class="xw1"><?php echo $U_sername; ?></a></div>
							</div>
							<!--显示用户信息 START-->
							<div class="p_pop blk bui" id="userinfo<?php echo $Id; ?>" style="display:none; margin-top: -11px;" onmouseout="showdpic('userinfo','<?php echo $Id; ?>')">
								<div class="m z">
									<div id="userinfo<?php echo $Id; ?>_ma"><img src="<?php echo $P_icture; ?>" class="max_pic" /></div>
								</div>
								<div class="i y">
								<div>
								<strong><?php echo $U_sername; ?></strong>
								<em>当前在线</em>
								</div>
								<dl class="cl"><dt>注册时间</dt><dd><?php echo $R_egtime; ?></dd><dt>积分</dt><dd><?php echo $G_rade; ?></dd><dt>最后登录</dt><dd><?php echo $L_asttime; ?></dd></dl>
								<div class="imicn">
								<a href="#" target="_blank" title="查看详细资料"><img src="<?php echo $domain_resource; ?>/images/userinfo.gif" alt="查看详细资料" /></a>
								</div>
								<div id="avatarfeed"><span id="threadsortswait"></span></div>
								</div>
							</div>
							<!--显示用户信息 END-->
							<div>
							<div class="avatar" onmouseover="showbpic('userinfo','<?php echo $Id; ?>')">
								<img src="<?php echo $P_icture; ?>" class="max_pic" />
							</div>
							<p><em><?php echo userGroup($U_dertype); ?></em></p>
							<p><em><?php echo userGrade($G_rade); ?></em></p>
							</div>
							
						</td>
						<td class="plc">
						<div class="pi">
						<div id="fj" class="y">
						<label class="z">电梯直达</label>
						<input id="louceng" type="text" class="px p_fre z" size="2" title="跳转到指定楼层" />
						<a href="javascript:;" id="fj_btn" class="z" title="跳转到指定楼层"><img src="<?php echo $domain_resource; ?>/images/fj_btn.png" onclick="golouceng()" alt="跳转到指定楼层" class="vm" /></a>
						<script>
						function golouceng(){
							location.href='detail.php?id=<?php echo $Id; ?>#post_'+document.getElementById('louceng').value;
						}
						</script>
						</div>
						<strong>
						<a href="detail.php?id=<?php echo $Id; ?>" id="postnum4">楼主</a>
						</strong>
						<div class="pti">
						<div class="pdbt">
						</div>
						<div class="authi">
						<img class="authicn vm" id="authicon<?php echo $Id; ?>" src="<?php echo $domain_resource; ?>/images/online_admin.gif" />
						<em id="authorposton<?php echo $Id; ?>">发表于 <?php echo $Addtime; ?></em>
						<!--<span class="pipe">|</span><a href="#">只看该作者</a>-->
						</div>
						</div>
						</div><div class="pct">
						<style type="text/css">.pcb{margin-right:0}</style>
						<div class="pcb">
						<?php if($Rate){?>
							<?php if(!$GuanLi && $_COOKIE['uid']!=$authorid && !$MyOrder){?>
							<div class="locked">
								<a href="detail.php?id=<?php echo $Id; ?>&pay=yes" class="y viewpay" title="购买主题">购买主题</a>
								<em class="right">
								</em>
								本主题需向作者支付 <strong><?php echo $Rate; ?> 金钱 </strong> 才能浏览							
							</div>
							<?php } else { ?>
							<div class="locked">
								付费主题, 价格: <strong><?php echo $Rate; ?> 金钱 </strong>
							</div>
							<div class="t_fsz">
							<table cellspacing="0" cellpadding="0">
								<tr>
									<td class="t_f" id="postmessage_<?php echo $Id; ?>">
									<?php echo $Content; ?>
									</td>
								</tr>
							</table>
							</div>
							<?php }?>
						<?php } else { ?>
						<div class="t_fsz">
						<table cellspacing="0" cellpadding="0">
							<tr>
								<td class="t_f" id="postmessage_<?php echo $Id; ?>">
								<?php echo $Content; ?>
								</td>
							</tr>
						</table>
						</div>
						<?php }?>
						<div id="comment_<?php echo $Id; ?>" class="cm">
						</div>
						<div id="post_rate_div_<?php echo $Id; ?>"></div>
						</div></div>
						
						</td>
					</tr>
					<tr>
						<td class="plc plm">
						<?php if($Elite){?>
						<div class="modact">本主题已加入精华</div>
						<?php }?>

						<?php if($A_utograph){?>
						<div class="sign" style="max-height:100px;maxHeightIE:100px;"><?php echo $A_utograph; ?></div>
						<?php }?>
						</td>
					</tr>
					<tr>
						<td class="pls"></td>
						<td class="plc">
							<div class="po">
								<?php if($GuanLi){?>
								<span class="y">
									<label for="manage5">
									<a href="detail.php?id=<?php echo $Id; ?>&del=1">删除</a><span class="pipe">|</span><a href="detail.php?id=<?php echo $Id; ?>&istop=1">置顶</a><span class="pipe">|</span><a href="detail.php?id=<?php echo $Id; ?>&elite=1">精华</a>
									</label>
								</span>
								<?php }?>
								<div class="pob cl">
									<em>
										<a class="fastre" href="#f_pst">回复</a>
									</em>
								</div>
							</div>
						</td>
					</tr>
					<tr class="ad">
						<td class="pls"></td>
						<td class="plc"></td>
					</tr>
				</table>
			</div>
			<?php }?>
			<!--楼主 END-->
			
			<!--回复列表 START-->
			<?php if(is_array($HTiZi)){foreach($HTiZi AS $hkey=>$hval) { ?>
			<div id="post_<?php echo setFloor($hkey); ?>">
				<table id="pid<?php echo $hval['id']; ?>" cellspacing="0" cellpadding="0">
					<tr>
						<td class="pls" rowspan="2">
							<div class="pi">
								<div class="authi"><?php echo $hval['username']; ?></div>
							</div>
							<!--显示用户信息 START-->
							<div class="p_pop blk bui" id="userinfo<?php echo $hval['id']; ?>" style="display:none; margin-top: -11px;" onmouseout="showdpic('userinfo','<?php echo $hval['id']; ?>')">
								<div class="m z">
									<div id="userinfo<?php echo $hval['id']; ?>_ma"><img src="<?php echo $hval['picture']; ?>" class="max_pic" /></div>
								</div>
								<div class="i y">
								<div>
								<strong><?php echo $hval['username']; ?></strong>
								<em>当前在线</em>
								</div>
								<dl class="cl"><dt>注册时间</dt><dd><?php echo formatTime($hval['regtime']); ?></dd><dt>积分</dt><dd><?php echo $hval['grade']; ?></dd><dt>最后登录</dt><dd><?php echo formatTime($hval['lasttime']); ?></dd></dl>
								<div class="imicn">
								<a href="#" target="_blank" title="查看详细资料"><img src="<?php echo $domain_resource; ?>/images/userinfo.gif" alt="查看详细资料" /></a>
								</div>
								<div id="avatarfeed"><span id="threadsortswait"></span></div>
								</div>
							</div>
							<!--显示用户信息 END-->
							<div>
								<div class="avatar" onmouseover="showbpic('userinfo','<?php echo $hval['id']; ?>')">
									<img src="<?php echo $hval['picture']; ?>" class="max_pic" />
								</div>
								<p><em><?php echo userGroup($hval['udertype']); ?></em></p>
								<p><em><?php echo userGrade($hval['grade']); ?></em></p>
							</div>
						</td>
						<td class="plc">
						<div class="pi">
							<strong><a><?php echo storey($hkey+($linum*($Lpage-1))); ?></a></strong>
							<div class="pti">
								<div class="pdbt">
								</div>
								<div class="authi">
									<img class="authicn vm" id="authicon<?php echo $hval['id']; ?>" src="<?php echo $domain_resource; ?>/images/online_admin.gif" />
									<em id="authorposton<?php echo $hval['id']; ?>">发表于 <span title="<?php echo formatTime($hval['addtime'],false); ?>"><?php echo getFormatTime($hval['addtime']); ?></span></em>
									<!--<span class="pipe">|</span><a href="#">只看该作者</a>-->
								</div>
							</div>
						</div>
						<div class="pct">
							<div class="pcb">
								<?php if($hval['isdisplay']){?>
								<div class="locked">提示: <em>该帖被管理员或版主屏蔽</em></div>
								<?php } else { ?>
								<div class="t_fsz">
									<table cellspacing="0" cellpadding="0">
										<tr>
											<td class="t_f" id="postmessage_<?php echo $hval['id']; ?>">
											<?php echo $hval['content']; ?>
											</td>
										</tr>
									</table>
								</div>
								<?php }?>
								<div id="comment_<?php echo $hval['id']; ?>" class="cm">
								</div>
								<div id="post_rate_div_<?php echo $hval['id']; ?>"></div>
							</div>
						</div>
						<?php if($hval['autograph']){?>
						<div class="sign" style="max-height:100px;maxHeightIE:100px;"><?php echo $hval['autograph']; ?></div>
						<?php }?>
						</td>
					</tr>
					<tr>
						<td class="plc plm"></td>
					</tr>
					<tr>
						<td class="pls"></td>
						<td class="plc">
							<div class="po">
								<?php if($GuanLi){?>
								<span class="y">
									<label for="manage5">
									<a href="detail.php?id=<?php echo $Id; ?>&hid=<?php echo $hval['id']; ?>&delht=1">删除</a><span class="pipe">|</span><a href="detail.php?id=<?php echo $Id; ?>&hid=<?php echo $hval['id']; ?>&istopht=1">置顶</a><span class="pipe">|</span><a href="detail.php?id=<?php echo $Id; ?>&hid=<?php echo $hval['id']; ?>&isdislpay=1">屏蔽</a>
									</label>
								</span>
								<?php }?>
								<div class="pob cl">
									<em>
										<a class="fastre" href="#f_pst">回复</a>
									</em>
								</div>
							</div>
						</td>
					</tr>
					<tr class="ad">
						<td class="pls"></td>
						<td class="plc"></td>
					</tr>
				</table>
			</div>
			<?php }}?>
			<!--回复列表 END-->
		</div>
		
		<div class="pgs mtm mbm cl">
			<span class="pgb y" id="visitedforumstmp">
			<a href="list.php?classid=<?php echo $classId; ?>">返回列表</a></span>
			<a id="newspecialtmp" href="addc.php?classid=<?php echo $classId; ?>" target="_blank" title ="发新帖"><img src="<?php echo $domain_resource; ?>/images/pn_post.png" alt="发新帖" /></a>
			<a id="post_replytmp" href="#f_pst" title="回复"><img src="<?php echo $domain_resource; ?>/images/pn_reply.png" alt="回复" /></a>
		</div>
		<div style="width:960px; margin:0 auto; padding:10px 0px; text-align:right">
		<?php echo fpage($zCount, $linum, [8,3,4,5,6,7,0,1,2]); ?>
		</div>
		<!--回帖 START-->
		<div id="f_pst" class="pl bm bmw">
			<form method="post" autocomplete="off" id="fastpostform" action="detail.php">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td class="pls">
						<div class="avatar"><img src="<?php if(empty($_COOKIE['picture'])){?><?php echo $domain_resource; ?>/images/avatar_blank.gif<?php } else { ?><?php echo $_COOKIE['picture']; ?><?php }?>" class="max_pic" /></div>
					</td>
					<td class="plc">
						<span id="fastpostreturn"></span>
						<div class="cl">
							<div id="fastsmiliesdiv" class="y">
									<script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
									<script src="public/ckeditor/sample.js" type="text/javascript"></script>
									<textarea name="message" id="editor1" class="ckeditor1"></textarea>
									<script type="text/javascript">
									//<![CDATA[
							
										// Replace the <textarea id="editor"> with an CKEditor
										// instance, using default configurations.
										CKEDITOR.replace( 'editor1',
											{
												extraPlugins : 'uicolor',
												toolbar :
												[
													[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
													[ 'UIColor' ]
												]
											});
							
									//]]>
									</script><br />

							</div>
							<p class="ptm pnpost">
								<button type="submit" name="replysubmit" id="fastpostsubmit" class="pn pnc vm" value="replysubmit" tabindex="5">
								<strong>发表回复</strong></button>
							</p>
						</div>
						<input name="id" type="hidden" value="<?php echo $Id; ?>" />
						<input name="classid" type="hidden" value="<?php echo $classId; ?>" />
					</td>
				</tr>
			</table>
			</form>
		</div>
		<!--回帖 END-->
	</div>
		

</div>
<!--LIST end-->
<script>
function showbpic(obj1,obj2){

	document.getElementById(obj1+obj2).style.display='block';
	//document.getElementById(obj1+obj2+'_ma').innerHtml=document.getElementById('avatar'+obj2).innerHtml;

}

function showdpic(obj1,obj2){

	document.getElementById(obj1+obj2).style.display='none';
	//document.getElementById(obj1+obj2+'_ma').innerHtml='';

}
</script>

<!--FOOT start-->
<?php include template("footer.html");?>
<!--FOOT end-->
<style>
	.paylist{
		z-index:20;
		left:50%;/*ff ie7*/
		top:50%;/*ff ie7*/
		background:#FFFFFF;
		margin-left:-100px!important;/*ff ie7 该值为本身宽的一半 */
		margin-top:-60px!important;/*ff ie7 该值为本身高的一半*/
		margin-top:0px;
		position:fixed!important;/*ff ie7*/
		position:absolute;/*ie6*/
		_top:       expression(eval(document.compatmode &&
					document.compatmode=='css1compat') ?
					documentelement.scrolltop + (document.documentelement.clientheight-this.offsetheight)/2 :/*ie6*/
					document.body.scrolltop + (document.body.clientheight - this.clientheight)/2);/*ie5 ie5.5*/
	}
</style>
<div class="paylist" style="width:410px; overflow:hidden; border:5px solid #ccc;<?php if(empty($_GET['pay'])){?> display:none;<?php }?>">
	<form id="payform" method="post" autocomplete="off" action="">
	<div class="f_c">
		<h3 class="flb">
			<em id="return_">购买主题</em>
			<span>
				<a href="detail.php?id=<?php echo $Id; ?>" class="flbc" title="关闭">关闭</a>
			</span>
		</h3>
		<div class="c">
			<table class="list" cellspacing="0" cellpadding="0" style="width:400px">
				<tr>
					<td width="20"></td>
					<td><b>帖子</b></td>
					<td width="80"><b>作者</b></td>
					<td width="100"><b>售价(积分)</b></td>
				</tr>
				<?php if(is_array($OrderList)){foreach($OrderList AS $key=>$val) { ?>
				<tr>
					<td><input type="checkbox" name="oidarr[<?php echo $val['oid']; ?>]" value="<?php echo $val['authorid']; ?>,<?php echo $val['rate']; ?>" /></td>
					<td><?php echo $val['title']; ?></td>
					<td><?php echo getUserName($val['authorid']); ?></td>
					<td><?php echo $val['rate']; ?></td>
				</tr>
				<?php }}?>
				<tr>
					<td colspan="3"><b>总计：</b></th>
					<td><b><?php echo $allpay['zpay']; ?></b></td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="o pns">
						<button type="submit" name="paysubmit" class="pn pnc" value="true"><span>购买</span></button>
						<button type="submit" name="delsubmit" class="pn pnc" value="true"><span>删除</span></button>
						</div>
					</th>
				</tr>
			</table>
		</div>
	</div>
	</form>
</div>

</body>
</html>

