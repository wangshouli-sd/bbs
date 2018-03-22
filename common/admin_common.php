<?php
/**
 * 验证登陆状态
 */
    if(!$_SESSION['uid'])
    {
        $msg = '<font color=red><b>您还没有登录</b></font>';
        $url = 'admin.php';
        $style = 'alert_error';
        $toTime = 3000;
        include 'notice.php';
        exit;
    }