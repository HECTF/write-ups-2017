<?php
/**
 * Created by PhpStorm.
 * User: tudoudou
 * Date: 2017/12/8
 * Time: 上午9:22
 */


$html=<<<html
<!DOCTYPE html>
<html lang="ch">
<head>
    <meta charset="UTF-8">
    <title>河北师范大学校园管理系统</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>
<div id="login">
    <img src="logo_school.png" alt="">
    <span id="wifi">&nbsp;校园管理</span>
<form action="index.php">
    <div id=user_area>
        <p>
        <label for="username">用户名:</label>
        <input id="username" name="username"type="text">
        </p>
        <p>
        <label for="password">密&nbsp;&nbsp;&nbsp;码:</label>
        <input name="password" type="password">
        </p>
        <p>&nbsp;</p>
        <p>
            <table id="RadioButtonList1" border="0">
                <tbody><tr>
                <td><input id="RadioButtonList1_0" type="radio" name="RadioButtonList1" value="部门" tabindex="4"><label for="RadioButtonList1_0">部门</label></td><td><input id="RadioButtonList1_1" type="radio" name="RadioButtonList1" value="教师" tabindex="4"><label for="RadioButtonList1_1">教师</label></td><td><input id="RadioButtonList1_2" type="radio" name="RadioButtonList1" value="学生" checked="checked" tabindex="4"><label for="RadioButtonList1_2">学生</label></td><td><input id="RadioButtonList1_3" type="radio" name="RadioButtonList1" value="访客" tabindex="4"><label for="RadioButtonList1_3">访客</label></td>
                </tr>
                </tbody>
            </table>
        </p>
        <p>
            <input type="submit" name="Button1" value="" id="Button1" class="btn_dl">
            <input type="reset" name="Button2" value="" id="Button2" class="btn_cz">
        </p>
    </div>
</form>

</div>
</body>
</html>

html;


if(isset($_GET['username'])&&$_GET['username']){
    $db = new MySQLi("localhost","root","","sql_universal_password");
    mysqli_connect_error()?die("连接失败"):"";
    $sql = "select count(*) from hctf where username='{$_GET['username']}' and password='{$_GET['password']}'";
    $result = $db->query($sql);
    $n = $result->fetch_row();
    if($n[0]>0)
    {
        echo 'flag{UlhgdTSa5cWyM67GPC8EwLfv9juoYI0DKHF4ekt}';
    }
    else
    {
        echo '用户名密码错误';
        echo $html;
    }
}else{

    echo $html;
}

?>


