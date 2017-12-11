<?php
/**
 * Created by PhpStorm.
 * User: tudoudou
 * Date: 2017/12/8
 * Time: 上午10:26
 */

$html=<<<html

<!DOCTYPE html>
<html>
<head>
	<title>SQL注入</title>
	<meta charset="UTF-8">
	<!--听说cookie也能注入-->
</head>
<body>
Have fun!!
</body>
</html>

html;

$text1=<<<html

<!DOCTYPE html>
<html>
<head>
	<title>欢迎</title>
	<meta charset="UTF-8">
</head>
<body>
<h1>
html;

$text2=<<<html
，你好，然而你没有管理员权限哦</h1>
</body>
</html>
html;




if(!empty($_COOKIE['text'])){
    echo $html;
    if ($_COOKIE['text']=='true'){
        $qq=$_COOKIE['user'];
        if ($_COOKIE['user']=='admin'){
            $qq='flag{fTwruUZdk3Ma2tGpKPizv1OlSh9BWXVRyQD4o6s}';
        }
        echo $text1.$qq.$text2;
    }
}
else{
    echo $html;
    setcookie('blessing','Have fun!', time()+60*60);
    setcookie('text','false', time()+60*60);
    setcookie('user','user', time()+60*60);
}