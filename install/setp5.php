<?php
	if(file_exists('../install.lock')){
		exit('网站已经被安装过了，如果需要重新安装网站，请删除 /install.lock 文件');
	}
	include '../config/database.php';
	if(!empty($_POST['submitname'])){

			$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

			if(mysqli_errno($conn)){

				exit(mysqli_error($conn));
			}

			mysqli_set_charset($conn, DB_CHARSET);

			$username=trim($_POST['username']);

			$password=md5(trim($_POST['password']));

			$time=time();

			if ($_SERVER['REMOTE_ADDR'] == '::1') {
				$ip=ip2long('127.0.0.1');
			} else {
				$ip=ip2long($_SERVER['REMOTE_ADDR']);				
			}


			$email=trim($_POST['email']);

			$sql="insert into ".DB_PREFIX."user(uid,username,password,email,udertype,regtime,regip) values(1,'{$username}','{$password}','{$email}',1,$time,$ip)";

			echo $sql;

			$result=mysqli_query($conn, $sql);

			if($result && mysqli_affected_rows($conn))
			{

				echo '安装成功';
				file_put_contents('../install.lock','');
				header('location:../index.php');
				exit;

			}else{

				echo mysqli_error($conn);

				echo '添加管理员失败';

			}

			mysqli_close($conn);

	}

?>