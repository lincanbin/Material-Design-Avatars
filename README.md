# Material-Design-Avatars
Create material deisgn avatars for users just like Gmail or Messager in Android.

[Online Demo](http://www.94cb.com/Material-Design-Avatars/)

Language Support
------------
![E](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=E&size=64)![N](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=N&size=64)![G](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=G&size=64)![L](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=L&size=64)![I](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=I&size=64)![S](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=S&size=64&cache=none)![H](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=H&size=64)

![J](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E7%AE%80&size=64&cache=none)![T](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E4%BD%93&size=64)![Z](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E4%B8%AD&size=64)![W](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E6%96%87&size=64)

![F](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E7%B9%81&size=64)![T](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E9%AB%94&size=64&cache=none)![Z](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E4%B8%AD&size=64&cache=none)![W](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E6%96%87&size=64&cache=none)

![R](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E3%81%AB&size=64&cache=none)![I](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E3%81%BB&size=64&cache=none)![Y](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E3%82%93&size=64)![U](http://www.94cb.com/Material-Design-Avatars/avatar.php?char=%E3%81%94&size=64)


Screenshot
------------
![1430381668945092](https://cloud.githubusercontent.com/assets/5785188/7410189/2b6de268-ef5f-11e4-9499-96ae36383fa6.png)


Initialize
------------
```php
<?php
require(dirname(__FILE__) . "/src/MaterialDesign.Avatars.class.php");
/*
'X'         : The character that you want to fill to the avatar.
512 (pixel) : The size of the avatar.
*/
$Avatar = new MDAvtars('X', 512);
?>
```

Usage
------------

#### Show you avatar in the browser

```php
<?php
$Avatar->Output2Browser();
?>
```

```php
<?
//You can resize the ouput size again here.
$OutputSize = 256;
$Avatar->Output2Browser($OutputSize);
?>
```

#### Save avatar to a file

```php
<?php
$Avatar->Save('./avatars/Avatar.png');
//You can resize the size you want to save again here.
$Avatar->Save('./avatars/Avatar256.png', 256);
$Avatar->Save('./avatars/Avatar128.png', 128);
$Avatar->Save('./avatars/Avatar64.png', 64);
?>
```

#### Free memory

```php
<?php
$Avatar->Free();
?>
```

#### Notice
If you do not need Chinese support, you can delete ```src/fonts/SourceHanSansCN-Normal.ttf```.

When you input a Chinese character, it will automatically extract the first letter of the pinyin of the Chinese character instead of the original input if you deleted ```src/fonts/SourceHanSansCN-Normal.ttf```. 
```php
$Avatar = new MDAvtars('林', 512);//The pinyin of "林" is "Lin".
```
This will be the same as that below if you deleted ```src/fonts/SourceHanSansCN-Normal.ttf```. 
```php
$Avatar = new MDAvtars('L', 512);//The first letter of that pinyin is "Lin".
```


License
------------

[Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0)