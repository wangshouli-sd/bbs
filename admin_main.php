<?php

	include 'common/common.php';
	include 'common/admin_common.php';

	if(!empty($_POST['settingsubmit'])){

		$str = file_get_contents('config/config.php');



		foreach($_POST as $key=>$val){

			if($key == 'WEB_ISCLOSE'){

				$pattern="/define\('$key',.*?\);/";
				$replace="define('$key',$val);";
			}else{

				$pattern="/define\('$key','.*?'\);/";
				$replace="define('$key','$val');";
			}

			$str = preg_replace($pattern, $replace, $str);

		}


		file_put_contents('config/config.php',$str);
		header('location:admin_main.php');

	}


	$title=WEB_NAME." - 管理中心 - 站点信息设置";


	include template("admin_main.html");

?>
