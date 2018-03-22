<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/style.css" />
	<?php if($thispage=="index.php"){?>
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/index.css" />
	<?php } else if($thispage=='list.php'){ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/list.css" />
	<?php } else if($thispage=='detail.php'){ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $domain_resource; ?>/css/view.css" />
	<?php } else if($thispage=='user.php'){ ?>
	<link rel="stylesheet" type="text/css" href="css/home.css" />
	<?php }?>
</head>

<body>
