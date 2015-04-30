# Material-Design-Avatars
Create material deisgn avatars for users just like Gmail or Messager in Android.

[Online Demo](http://www.94cb.com/Material-Design-Avatars/)


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

License
------------

[Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0)