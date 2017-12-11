<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>弹个窗你就赢了，很简单吧？</title>
	<script src='main.js'></script>
</head>
<body>
	<p style='color: red;font-weight: bolder;'>hint:这是一道简单的xss题。使用alert弹个窗你就赢了，很简单吧？</p>
	<h1>据说这里可以查任意同学的qq头像哦！要不要试试哦！。</h1>
	<form action="" method="POST">
		<label for="echo">请输入要查询的qq号。</label>
		<input type="text" name='echo'>
		<input type="submit" value='查询'>
	</form>

	<?php
	function download($url, $filename,$path = 'images/')
	{
		try
		 {
			  $ch = curl_init();
			  curl_setopt($ch, CURLOPT_URL, $url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
			  $file = curl_exec($ch);
			  curl_close($ch);
			  // $filename = pathinfo($url, PATHINFO_BASENAME);
			  $resource = fopen($path . $filename, 'a');
			  fwrite($resource, $file);
			  fclose($resource);
		 }
		//捕获异常
		catch(Exception $e)
		 {
			return -1;
		 }
		
	}
	if($_POST&&$_POST['echo']){
		
		if( is_numeric($_POST['echo'])){
			$file_url='http://qlogo4.store.qq.com/qzone/123456/'.$_POST['echo'].'/100';
			$save_to=$_POST['echo'].'.png';
			download($file_url, $save_to);
		}

		echo '<img src="images/'.$_POST['echo'].'.png">';
		
	}
	?>
</body>
</html>

