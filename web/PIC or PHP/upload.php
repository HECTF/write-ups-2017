<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
<?php
$error=$_FILES['pic']['error'];
$tmpName=$_FILES['pic']['tmp_name'];
$name=$_FILES['pic']['name'];
$size=$_FILES['pic']['size'];
$type=$_FILES['pic']['type'];
try{
	if($name!=="")
	{
		$name1=substr($name,-4);
		
		if($type!=="image/jpeg"&&$type!=="image/gif"&&$type!=="image/png")
		{
			echo mime_content_type($tmpName);
			echo "<script language=javascript>alert('不允许的文件类型！');history.go(-1)</script>";
			exit;
		}
		if(is_uploaded_file($tmpName)){
			$time=time();
			$rootpath='./uploads/'.md5($time).$name1;
			if(move_uploaded_file($tmpName,$rootpath)){
				echo "图片链接：<a href='./uploads/".md5($time).$name1."'>./uploads/".md5($time).$name1."</a>";
				if(md5_file($rootpath)!='2009662585b47a3b932c613e3763e27a' && $name1=='.php')
					unlink($rootpath);
			}
			
		}

	}
}
catch(Exception $e)
{
	echo "ERROR";
}
//
 ?>
 </html>
