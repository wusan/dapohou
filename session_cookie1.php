<?php
	date_default_timezone_set("PRC");//设置默认时间为北京时间.否则报错。
	session_start();
	$_SESSION['admin']=null;//声明一个变量，赋值为空。注册会话
	if(!empty($_SESSION['a1355'])){
		$v2=$_SESSION['a1355'];
	}
	
	
	


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
	<pre>
	1.session存在于服务器上。它创建的会话变量在生命周期(20分钟)中可以被跨页的请求所使用。
	  通常指从注册进入系统到退出系统所经过的时间。故它是一个特定的时间概念。
	2.session工作原理：当启动一个session会话时，会产生一个随机且唯一的session_id.也就是session的文件名,
						此时session_id存在服务器的内存中。当关闭网页时此id会自动注销，重新登录此页面，会再次生产一个随机且唯一的id。
	3.应用场合：若session不记录用户账号、购买的商品，则每个页面都需要进行登录。					
	4.创建会话步骤：启动会话-注册会话-使用会话-删除会话。
	5.使用session_start()前不能有任何输出.
	6.注册会话：$_SESSION['admin']=null;     全部保存在数组$_SESSION中。
	  使用会话：先判断会话变量中是否有一个会话id存在，不存在就创建然后$_SESSION访问。已存在，则将这个会话变量载入以供用户使用。
	7.删除会话
		a.删除单个会话：就是直接注销$_SESSION数组的某个元素。unset($_SESSION['user']);
		b.删除所有会话:$_SESSION=array();赋值一个空数组
		c.结束当前会话：session_destory();
	8.设置session失效时间：
		session_start();
		$time=1*60;
		setcookie(session_name,session_id(),time()+$time,"/");
		$_SESSION['user']="yc";
		
		session_name:session名称，session_id:判断客户端用户的标示，因为session_id是随机产生的唯一名称。失效时间和cookie的失效时间一样。"/" 是cookie的路径。
	</pre>

</body>
