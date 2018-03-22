<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 图片验证码函数库     		                                                                        |
 * -------------------------------------------------------------------------------------------------+
 */

	/**
	 * 构建验证码
	 * @param Integer $width
	 * @param Integer $height
	 * @param Integer $length
	 * @param Integer $type
	 * @param String $imageType
	 * @param Resource
	 */

	function yzm($width = 80, $height = 20, $length = 4, $type = 3, $imageType = 'jpeg')
	{
		//产生字符串
		switch($type)
		{
			//0-9
			case 1:
				//产生指定区间的数组
				$str = join('',array_rand(range(0,9),4));
				break;
			case 2:
				//产生a-z区间，并且随机取出4个元素
				$str = implode('',array_rand(array_flip(range('a','z')),4));
				break;
			case 3:
				for($i=0;$i<$length;$i++)
				{
					$string='abcdefghijkmnpqrstuvwxyABCDEFGHJKLMNPQRSTUVWXY23456789';
					$string=str_shuffle($string);
					$str.=substr($string,0,1);
				}
				break;
		}

		//创建画布
		$img = imagecreate($width,$height);

		//随机产生深色和浅色，浅色供背景使用，深色供字体使用
		//随机产生一个背景
		imagefilledrectangle($img, 0, 0, $width, $height, lightColor($img));

		//画干扰元素点和随机曲线
		for($i=0;$i<50;$i++)
		{
			imagesetpixel($img, mt_rand(1, $width), mt_rand(1, $height), darkColor($img));
		}

		//随机曲线
		for($i=0;$i<5;$i++){
			imagearc(
				$img,
				mt_rand(20, $width),
				mt_rand(20, $height),
				mt_rand(20, 80),
				mt_rand(20, 80),
				mt_rand(0, 90),
				mt_rand(180, 360),
				lightcolor($img)
			);
		}

		for($i=0;$i<$length;$i++)
		{
			$x = ceil($width / $length) * $i;
			$y = mt_rand(0, $height - 20);
			imagechar($img, 5, $x, $y, $str[$i], darkColor($img));
		}

		$headerStr = 'Content-type:image/' . $imageType;
		$func = 'image' . $imageType;

		if (function_exists($func))
		{
			header($headerStr);
			$func($img);
		}else{
			exit('当前服务器不支持该类型图片');
		}
		imagedestroy($img);
		return $str;
	}

	/**
	 * 为验证码定义两个函数，能够随机产生浅颜色和深颜色
	 */

	function lightColor($img)
	{
		return imagecolorallocate($img, mt_rand(130,255), mt_rand(130,255), mt_rand(130,255));
	}

	function darkColor($img)
	{
		return imagecolorallocate($img, mt_rand(0,125), mt_rand(0,125), mt_rand(0,125));
	}
