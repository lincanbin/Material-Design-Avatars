<?php
/*
 * Material-Design-Avatars
 * https://github.com/lincanbin/Material-Design-Avatars
 *
 * Copyright 2015, Canbin Lin
 * http://www.94cb.com/
 *
 * Licensed under the Apache License, Version 2.0:
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Create material deisgn avatars for users just like Gmail or Messager in Android.
 */
class MDAvtars
{
	public $Char;
	public $AvatarSize;
	public $Padding;
	public $Avatar;
	public $FontFile;

	function __construct($Char, $AvatarSize = 256, $Padding=30)
	{
		$this->Char = strtoupper($Char);
		$this->AvatarSize = $AvatarSize;
		$this->Padding = $Padding;
		$this->FontFile = dirname(__FILE__) . '/' . 'fonts/SourceCodePro-Regular.ttf';
		$this->Initialize();
	}

	private function Initialize()
	{
		//extension_loaded('gd')
		$Width  = $this->AvatarSize;//Width of avatar
		$Height = $this->AvatarSize;//Height of avatar
		$Padding = $this->Padding;
		$FontSize = $Width - $Padding * 2;
		$this->Avatar = imagecreatetruecolor($Width, $Height);
		//全透明背景
		imageSaveAlpha($this->Avatar, true);
		$BackgroundAlpha = imagecolorallocatealpha($this->Avatar, 255, 255, 255, 127);
		imagefill($this->Avatar, 0, 0, $BackgroundAlpha);
		//抗锯齿
		imageantialias($this->Avatar, true);
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
		$BackgroundColor = imagecolorallocate($this->Avatar, 
											  $MaterialDesignColor[$BackgroundColorIndex][0],
											  $MaterialDesignColor[$BackgroundColorIndex][1],
											  $MaterialDesignColor[$BackgroundColorIndex][2]
											 );
		//画一个居中圆形
		imagefilledellipse($this->Avatar, 
						   $Width/2, 
						   $Height/2, 
						   $Width, 
						   $Height, 
						   $BackgroundColor
		);
		//字体
		$FontColor = imagecolorallocate($this->Avatar, 255, 255, 255);
		// 在圆正中央填入字符
		imagettftext($this->Avatar, 
					 $FontSize, 
					 0, 
					 $Padding + (20/196)*$FontSize, 
					 $Height - $Padding - (13/196)*$FontSize, 
					 $FontColor, 
					 $this->FontFile, 
					 $this->Char
		);
	}

	private function Resize($TargetSize)
	{
		if (isset($this->Avatar)) {
			if ($this->AvatarSize > $TargetSize) {
				$Percent      = $TargetSize / $this->AvatarSize;
				$TargetWidth  = round($this->AvatarSize * $Percent);
				$TargetHeight = round($this->AvatarSize * $Percent);
				$TargetImageData = imagecreatetruecolor($TargetWidth, $TargetHeight);
				//全透明背景
				imageSaveAlpha($TargetImageData, true);
				$BackgroundAlpha = imagecolorallocatealpha($TargetImageData, 255, 255, 255, 127);
				imagefill($TargetImageData, 0, 0, $BackgroundAlpha);
				imagecopyresampled($TargetImageData, $this->Avatar, 0, 0, 0, 0, $TargetWidth, $TargetHeight, $this->AvatarSize, $this->AvatarSize);
				return $TargetImageData;
			} else {
				return $this->Avatar;
			}
		} else {
			return false;
		}
	}

	public function Free()
	{
		imagedestroy($this->Avatar);
	}

	public function Output2Browser($AvatarSize=256)
	{
		header ('Content-Type: image/png');
		imagepng($this->Resize($AvatarSize));
	}

	public function Save($AvatarSize=256, $Path)
	{
		imagepng($this->Resize($AvatarSize), $Path);
	}
}