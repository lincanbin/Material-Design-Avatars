<?php
require(dirname(__FILE__) . "/src/MaterialDesign.Avatars.class.php");
$TestData = ['q','w','e','r','t','y','u','i','o','p','a','s','d','f',
			 'g','h','j','k','l','z','x','c','v','b','n','m','0','1',
			 '2','3','4','5','6','7','8','9','林','灿','斌','编','写',
			 '于','二','零','一','五','年','四','月','三','十','日'];
if(!empty($_GET['Char'])){
	$Char = $_GET['Char'];
}else{
	$Char = $TestData[mt_rand(0,count($TestData)-1)];
}

$Avatar = new MDAvtars($Char, 512, 60);
$Avatar->Output2Browser(512);
$Avatar->Save(128,'./avatars/Avatar.png');
$Avatar->Free();