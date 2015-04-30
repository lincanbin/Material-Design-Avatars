<?php
require(dirname(__FILE__) . "/src/MaterialDesign.Avatars.class.php");
$TestData = str_split('qwertyuiopasdfghjklzxcvbnm0123456789', 1);

$Avatar = new MDAvtars(strtoupper($TestData[mt_rand(0,35)]), 256);
$Avatar->Output2Browser(256);
$Avatar->Save(128,'./avatars/Avatar.png');
$Avatar->Free();