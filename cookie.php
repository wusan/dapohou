<?php
	date_default_timezone_set("PRC");//设置默认时间为北京时间.否则报错。
	
	setcookie("url","www.php.com");
	setcookie("url","www.php.com",time()+60);//cookie有效时间为60秒
	setcookie("url2","www.2222.com");
	setcookie("url2","",0);
	if(!isset($_COOKIE["visittime"])){//cookie文件是否存在
		setcookie("visittime",date("y-m-d H:i:s"));
		echo "first visit";
	}else{
		setcookie("visittime",date("y-m-d H:i:s"),time()+60);//cookie有效时间为60秒
		echo "last access time:".$_COOKIE['visittime']."<br>";
	}
	echo "this access time:".date("y-m-d H:i:s");
	
	


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
	<pre>
	cookie文件的命名：用户名@网站地址[数字].txt..内容都是加密的。
	cookie是HTTP头标的组成部分，而头标必须在页面其他内容之前发送,因此它必须最先输出。
		故在setcookie()函数前不能有任何html标记、echo语句，设置一个空行都导致程序出错。
	语法：setcookie(name,val[,expire,path,domain,secure]);
		name:cookie变量名，可通过$_COOKIE['name']获取变量名为name的cookie
		value:值，可通过$_COOKIE['value']获取名为value的值
		expire:失效时间。若不设置则永远有效.，可用time() mktime()获取，单位为秒
		path:在服务器端的有效路径。若为“/”则在整个domian内有效。
			 若为“/22”，在在domain下的22目录及子目录有效。默认为当前目录。
		secur:若为1，则cookie只在htmls下有效。默认为0，在http和https链接上都有效。
	</pre>
	<pre>
	删除cookie：setcookie("name","",time()-1);//当前时间-1，回到过去。
				setcookie("name","",0);//设置为0，直接删除
	</pre>
	<?php
		echo nl2br($_POST[a])."<br>";//nl2br将换行符"\n" 替换成<br/>
		echo nl2br($_POST[b])."<br>";
	?>
</body>
