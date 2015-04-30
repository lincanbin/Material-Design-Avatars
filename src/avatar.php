<?php
//extension_loaded('gd')
$Width  = 256;//Width of avatar
$Height = 256;//Height of avatar
$Padding = 30;
$FontSize = $Width - $Padding * 2;
header ('Content-Type: image/png');
$Avatar = @imagecreatetruecolor($Width, $Height)
	  or die('Cannot Initialize new GD image stream');
//全透明背景
imageSaveAlpha($Avatar, true);
$BackgroundAlpha = imagecolorallocatealpha($Avatar, 255, 255, 255, 127);
imagefill($Avatar, 0, 0, $BackgroundAlpha);
//抗锯齿
imageantialias($Avatar, true);
//Material Design参考颜色
//https://developer.android.com/design/style/color.html
//http://www.google.com/design/spec/style/color.html#color-color-palette
$MaterialDesignColor = array(
	[ 51, 181, 229],
	[170, 102, 204],
	[153, 204,   0],
	[255, 187,  51],
	[255,  68,  68],
	[  0, 153, 204],
	[153,  51, 204],
	[102, 153,   0],
	[255, 136,   0],
	[204,   0,   0]
);
$BackgroundColorIndex = mt_rand(0,9);
$BackgroundColor = imagecolorallocate($Avatar, 
									  $MaterialDesignColor[$BackgroundColorIndex][0],
									  $MaterialDesignColor[$BackgroundColorIndex][1],
									  $MaterialDesignColor[$BackgroundColorIndex][2]
									 );
//画一个居中圆形
imagefilledellipse($Avatar, 
				   $Width/2, 
				   $Height/2, 
				   $Width, 
				   $Height, 
				   $BackgroundColor
);
//字体
$FontFile = '../fonts/SourceCodePro-Regular.ttf';
$FontColor = imagecolorallocate($Avatar, 255, 255, 255);
// 在圆正中央填入字符
$TestData = str_split('qwertyuiopasdfghjklzxcvbnm0123456789', 1);

imagettftext($Avatar, 
			 $FontSize, 
			 0, 
			 $Padding + (20/196)*$FontSize, 
			 $Height - $Padding - (13/196)*$FontSize, 
			 $FontColor, 
			 $FontFile, 
			 strtoupper($TestData[mt_rand(0,35)])
);
//输出
imagepng($Avatar);
imagepng($Avatar, '../avatars/Avatar.png');
imagedestroy($Avatar);