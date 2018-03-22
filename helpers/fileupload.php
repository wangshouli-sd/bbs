<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 文件上传函数库     	                                                                                |
 * -------------------------------------------------------------------------------------------------+
 */

	/**
	 * 图片上传
	 * @param String $name
	 * @param Integer $maxsize
	 * @param Array $allowSub
	 * @param Array $allowMime
	 * @param Boolean $isRandName
	 * @return String
	 */
	function upload($name, $maxsize = 2000000, $allowSub = ['jpg','jpeg','gif','png','bmp'], $allowMime = ['image/jpg','image/jpeg','image/jpe','image/gif','image/png','image/x-png','image/bmp'], $isRandName = true)
	{
		$files=$_FILES[$name];
		if (is_array($files['name']))
		{
			//如果是数组执行多文件上传	
			for($i=0; $i<count($files['name']); $i++){
			//文件最大值，允许的文件类型，允许的MIME类型，是否生成随机文件名称
			$fileName=$files['name'][$i];
			$fileType=$files['type'][$i];
			$fileTmpName=$files['tmp_name'][$i];
			$fileError=$files['error'][$i];
			$fileSize=$files['size'][$i];
			if ($fileName!='')
			{
				return fileUp($fileName, $fileType, $fileTmpName, $fileError, $fileSize, $maxsize, $allowSub, $allowMime, $isRandName);
			}
			}
		
		}else{

			//如果不是数组执行单文件上传
			$fileName=$files['name'];
			$fileType=$files['type'];
			$fileTmpName=$files['tmp_name'];
			$fileError=$files['error'];
			$fileSize=$files['size'];
			return fileUp($fileName, $fileType, $fileTmpName, $fileError, $fileSize, $maxsize, $allowSub, $allowMime, $isRandName);
		
		}

	}

	function fileUp($fileName, $fileType, $fileTmpName, $fileError, $fileSize, $MaxSize, $allowSub, $allowMime, $isRandName)
	{

		if (!$fileError)
		{
			//上传文件不能超过手动设置的大小
			if ($fileSize>$MaxSize)
			{
				return $fileName.'文件大小超过了'.$Maxsize.'Bytes';
			}

			//判断文件的后缀名是否合法
			$arr = explode('.',$fileName);
			$subFix = array_pop($arr);
			if(!in_array($subFix,$allowSub))
			{
				return $fileName.'文件扩展名非法！';
			}

			//判断文件的MIME类型是否合法
			if (!in_array($fileType, $allowMime))
			{
				return $fileName.'文件MIME类型非法！';
			}

			//手动指定文件保存路径
			$path='upload/'.date('Y').'/'.date('m').'/'.date('d');
			
			//判断文件路径是否存在，不存在则创建
			if (!file_exists($path))
			{
				mkdir($path, 0777, true);
			}

			//判断是否生成随机文件名
			if($isRandName){
				$NewPath=$path.'/'.uniqid('yh_').'.'.$subFix;
			}else{
				$NewPath=$path.'/'.$fileName;
			}

			//判断是否为上传文件
			if (is_uploaded_file($fileTmpName))
			{
				if (move_uploaded_file($fileTmpName, $NewPath))
				{
					if (!in_array('txt', $allowSub) && !in_array('doc', $allowSub) && !in_array('xls', $allowSub) )
					{
						return $NewPath;
					}else{
						return $NewPath;
					}
				}
			}else{
				return '不是上传文件！';
			}

		}else{

			switch ($fileError)
			{
				case 1:
					return '文件大小超出了默认设置！<br />';
					break;
				case 2:
					return 'MAX_FILE_SIZE';
					break;
				case 3:
					return '只有部分文件被上传！<br />';
					break;
				case 4:
					return '没有文件被上传！<br />';
					break;
				case 6:
					return '找不到临时文件夹！<br />';
					break;
				case 7:
					return '文件写入失败！<br />';
					break;
			}

		}
	}
