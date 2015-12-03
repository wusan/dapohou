<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<pre>
fetch:取
mysql_fetch_object(result)：作用域mysql_fetch_array 类似，区别一个返回对象，一个返回数组。
		mysql_fetch_object只能通过字段名来访问。
		$row->col_name;//col_name为列名，$row代表结果集。
</pre>
<form name="myform" method="post" action="">
	<div>请输入名称：<input name="txt_book"/><input name="submit" type="submit" value="查询"/></div>
</form>
<?php
	$link=mysql_connect("localhost","root","123456") or die("不能");
	$db_selected=mysql_query("use db_study",$link);//注意use。。连接数据库
?>
<?php
	$sql=mysql_query("select * from tb_book");
	$info=mysql_fetch_object($sql);//修改为object
	if($_POST[submit]=="查询"){
		$txt_book=$_POST[txt_book];
		$sql=mysql_query("select * from tb_book  where bookname like'%".trim($txt_book)."%'" );//模糊查询
		$info=mysql_fetch_object($sql);//获取查询结果。返回值为对象。
	}
?>
<?php
	if($info==false){
		echo "<p style='color:#ff7300;'>对不起，查不到与此相关的图书.</p>";
	}
?>
<?php
	do{
?>
<div>
	<span>id:<?php echo $info->id;?></span>
	<span>name:<?php echo $info->bookname;?></span>
	<span>author:<?php echo $info->author;?></span>
</div>
<?php
	}while( $info=mysql_fetch_object($sql) );//为什么$info=mysql_fetch_array($sql)..它竟然能一条条弹出??为什么。。。
?>
























