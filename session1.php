<?php
	date_default_timezone_set("PRC");//设置默认时间为北京时间.否则报错。
	$sess_name=session_name();//取得session名称
	$sess_id=$_GET[$sess_name];//取得sessionID get方式
	session_id($sess_id);//关键步骤
	session_start();
	$_SESSION["admin"]="yc999";
	
	


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
	<input value="<?=session_id()?>" />
	<pre>

	</pre>

</body>
