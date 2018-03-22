<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 图片处理函数库     	                                                                                |
 * -------------------------------------------------------------------------------------------------+
 */

	/**
	 * 图片水印
	 * @param String $src
	 * @param String $logo
	 * @param Integer $tmd
	 * @param Integer $position
	 * @param String $prefix
	 * @return String
	 */
	function water($src, $logo, $tmd=100, $position=9, $prefix='wa_')
	{
		//图片信息通过自定义函数拿到了
		$srcInfo = getImageInfo($src);
		$logoInfo = getImageInfo($logo);
		//打开图片资源
		$srcRes = openImg($src,$srcInfo['mime']);
		$logoRes = openImg($logo,$logoInfo['mime']);
		switch($position)
		{
			case 1:
				$x=0;
				$y=0;			
				break;
			case 2:
				$x=floor(($srcInfo['width']-$logoInfo['width'])/2);
				$y=0;
				break;
			case 3:
				$x=$srcInfo['width']-$logoInfo['width'];
				$y=0;
				break;
			case 4:
				$x=0;
				$y=ceil(($srcInfo['height']-$logoInfo['height'])/2);
				break;
			case 5:
				$x=floor(($srcInfo['width']-$logoInfo['width'])/2);
				$y=ceil(($srcInfo['height']-$logoInfo['height'])/2);
				break;
			case 6:
				$x=$srcInfo['width']-$logoInfo['width'];
				$y=ceil(($srcInfo['height']-$logoInfo['height'])/2);
				break;
			case 7:
				$x=0;
				$y=$srcInfo['height']-$logoInfo['height'];
				break;
			case 8:
				$x=floor(($srcInfo['width']-$logoInfo['width'])/2);
				$y=$srcInfo['height']-$logoInfo['height'];
				break;
			case 9:
				$x=$srcInfo['width']-$logoInfo['width'];
				$y=$srcInfo['height']-$logoInfo['height'];
				break;
			default:
				$x=mt_rand(0,$srcInfo['width']-$logoInfo['width']);
				$y=mt_rand(0,$srcInfo['height']-$logoInfo['height']);
		}

		imagecopymerge($srcRes,$logoRes,$x,$y,0,0,$logoInfo['width'],$logoInfo['height'],$tmd);

		$name=$prefix.basename($src);

		SaveImg($srcRes,$name,$srcInfo['mime']);

		imagedestroy($srcRes);
		imagedestroy($logoRes);
		return $name;

	}


	//自定义保存函数，需要根据原有图片的mime，保存为原先的格式
	function saveImg($res,$name,$mime)
	{
		switch($mime){
			case 'image/jpeg':
			case 'image/jpg':
			case 'image/pjpeg':
				imagejpeg($res,$name);
				break;
			case 'image/wbmp':
				$res=imagewbmp($res,$name);
				break;
			case 'image/png':
			case 'image/x-png':
				$res=imagepng($res,$name);
				break;
			case 'image/gif':
				$res=imagegif($res,$name);
				break;
			default:
				echo '不认识这个类型';
				exit;
		}
	}

	//自定义一个函数，智能打开图片
	function openImg($path,$mime)
	{
		switch($mime){
			case 'image/jpeg':
			case 'image/jpg':
			case 'image/pjpeg':
				$res = imagecreatefromjpeg($path);
				break;
			case 'image/wbmp':
				$res = imagecreatefromwbmp($path);
				break;
			case 'image/png':
			case 'image/x-png':
				$res = imagecreatefrompng($path);
				break;
			case 'image/gif':
				$res = imagecreatefromgif($path);
				break;
			default:
				echo '不认识这个图片类型';
				exit;
		}
		return $res;
	}

	/**
	 * 获得图片信息的函数
	 * 为了更加方便得获得图片的相信信息，我们使用了$data来保存更详的信息，这样使用的时候，读取下标更有规范
	 */
	function getImageInfo($path)
	{
		$info=getimagesize($path);
		$data['width']=$info[0];
		$data['height']=$info[1];
		$data['mime']=$info['mime'];
		return $data;
	}
