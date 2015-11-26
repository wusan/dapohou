<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
	<a href="url.php?id=<?php echo urlencode("编程") ?>">点击看url.需要在ie中测试。</a>
	<?php
		echo "你提交的查询字符串为:".urldecode( $_GET[id] )
	?>
</body>
