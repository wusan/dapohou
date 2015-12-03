<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<pre>
fetch:取
mysql_fetch_row(result)：从指定的结果取出一行数据并作为数组返回，将慈航赋予数组变量$row，每个结果的列存在一个数组元素中，
						 下标从0开始，即$row[0] 访问第一个元素（只有一个元素时也是这样。），
						 依次调用mysql_fetch_row将返回结果集的下一行,直到没有更多行返回false.
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
	$info=mysql_fetch_row($sql);//row
	if($_POST[submit]=="查询"){
		$txt_book=$_POST[txt_book];
		$sql=mysql_query("select * from tb_book  where bookname like'%".trim($txt_book)."%'" );//模糊查询
		$info=mysql_fetch_row($sql);//获取查询结果。返回值为数组。
		// where bookname=js
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
	<span>id:<?php echo $row[0];?></span>
	<span>name:<?php echo $row[1];?></span>
	<span>author:<?php echo $row[2];?></span>
	
</div>
<?php
	}while( $row=mysql_fetch_row($sql) );
?>
<p>总共查询到：<span style="color:red;"><?php echo mysql_num_rows($sql);?></span>条记录</p>

<pre>
mysql_num_rows(result):获取select语句查询到的结果行的数目。即select返回结果的总记录数。
		注意：使用mysql_unbuffered_query()查询的结果，无法使用它进行统计总数。
如果获取insert、update、delete语句所影响的数据行数，则使用mysql_affected_rows()实现。		
</pre>






















