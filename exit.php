<?php
	date_default_timezone_set("PRC");//设置默认时间为北京时间.否则报错。
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['pwd']);
	session_destroy();
	header("location:session2.php");//跳转页面
	
	


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
	<input value="<?=session_id()?>" />
	<pre>

	</pre>

</body>
