<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
		<TITLE>登录管理中心</TITLE>
		<META content=text/html;charset=utf-8 http-equiv=Content-Type>
		<LINK rel=stylesheet type=text/css href="<?php echo $domain_resource; ?>/admin/admincp.css" media=all>
	</HEAD>
	<BODY>
	<SCRIPT language=JavaScript>
		if(self.parent.frames.length != 0) {
			self.parent.location=document.location;
		}
	</SCRIPT>

	<TABLE class=logintb>
	  <TBODY>
	  <TR>
		<TD class=login>
		  <H1>Discuz! Administrator's Control Panel</H1>
		  <P>Discuz! 是 <A href="http://www.tencent.com/" target=_blank>腾讯</A> 旗下 <A href="http://www.comsenz.com/" target=_blank>Comsenz</A> 
		  公司推出的以社区为基础的专业建站平台，帮助网站实现一站式服务。</P></TD>
		<TD>
		<FORM id=loginform method=post name=login action="" autocomplete="off">
			<P class=logintitle>用户名: </P>
			<P class=loginform><INPUT class=txt type="text" name=admin_username value="<?php echo $_COOKIE['username']; ?>" autocomplete="off"></P>
			<P class=logintitle>密　码:</P>
			<P class=loginform><INPUT class=txt type="password" name=admin_password autocomplete="off"></P>
			<P class=logintitle>提　问:</P>
			<P class=loginform>
				<SELECT id=questionid tabIndex=2 name=admin_questionid> 
					<OPTION selected value=0>无安全提问</OPTION>
					<OPTION value=1>母亲的名字</OPTION> 
					<OPTION value=2>爷爷的名字</OPTION>
					<OPTION value=3>父亲出生的城市</OPTION>
					<OPTION value=4>你其中一位老师的名字</OPTION>
					<OPTION value=5>你个人计算机的型号</OPTION>
					<OPTION value=6>你最喜欢的餐馆名称</OPTION>
					<OPTION value=7>驾驶执照最后四位数字</OPTION>
				</SELECT> 
			</P>
			<P class=logintitle>回　答:</P>
			<P class=loginform><INPUT class=txt tabIndex=3 type=text name=admin_answer autocomplete="off"></P>
			<P class=loginnofloat><INPUT class=btn value=提交 type=submit name=submit></P>
		</FORM>
		  <SCRIPT type=text/JavaScript>document.getElementById('loginform').admin_password.focus();</SCRIPT>
		</TD></TR>
	  </TBODY>
	</TABLE>
	<TABLE class=logintb>
		<TBODY>
			<TR>
				<TD class=footer colSpan=2>
					<DIV class=copyright>
						<P>Powered by <A href="http://www.discuz.net/" target=_blank>Discuz!</A> X2 </P>
						<P>© 2001-2011, <A href="http://www.comsenz.com/" target=_blank>Comsenz</A> Inc.</P>
					</DIV>
				</TD>
			</TR>
		</TBODY>
	</TABLE>
	</BODY>
</HTML>
