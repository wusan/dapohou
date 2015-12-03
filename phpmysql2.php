<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<pre>
fetch:取
mysql_fetch_array(result[,int result_type])：从数组结构集中获取信息
	result:要传入有mysql_query()函数返回的数据指针
	result_type:整数型参数，要传入的是mysql_assoc(关联索引)、mysql_num（数字索引）、mysql_both(同事包含关联和数字索引的数组) 3种索引类型，默认值为mysql_both;
				本函数返回的字段名区分大小写。
</pre>
<form name="myform" method="post" action="">
	<div>请输入名称：<input name="txt_book"/><input name="submit" type="submit" value="查询"/></div>
</form>
<?php
	$link=mysql_connect("localhost","root","123456") or die("不能");
	//mysql_query("set names gb2312");//设置mysql数据库编码为gb2312，防止乱码
	$db_selected=mysql_query("use db_study",$link);//注意use。。连接数据库
?>
<?php
	$sql=mysql_query("select * from tb_book");//查询
	$info=mysql_fetch_array($sql);//获取查询结果，返回值为数据
	if($_POST[submit]=="查询"){//是否单击了”查询`“
		$txt_book=$_POST[txt_book];//文本框值
		$sql=mysql_query("select * from tb_book  where bookname='".$txt_book."'" );//前面""结束+后面的双引号进行结束。。
																					// "123".$txt_book."123" 
		//$sql=mysql_query("select * from tb_book  where bookname='.$txt_book.'" );//执行模糊查询 使用通配符"%"."%"表示0个或多个字符
		$info=mysql_fetch_array($sql);//获取查询结果。
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
	<span>id:<?php echo $info[id];?></span>
	<span>name:<?php echo $info[bookname];?></span>
	<span>author:<?php echo $info[author];?></span>
</div>
<?php
	}while( $info=mysql_fetch_array($sql) );//为什么$info=mysql_fetch_array($sql)..它竟然能一条条弹出??为什么。。。
?>



<pre>
CREATE TABLE  `tb_book` ( `id` INT( 5 ) NOT NULL ,`bookname` VARCHAR( 50 ) NOT NULL ,`author` VARCHAR( 30 ) NOT NULL ) ENGINE = INNODB;

INSERT INTO  `db_study`.`tb_book` (`id` ,`bookname` ,`author`)VALUES ('4',  'php2',  '李慧琳');
INSERT INTO  `db_study`.`tb_book` (`id` ,`bookname` ,`author`)VALUES ('5',  'php2',  '周晓燕');
INSERT INTO  `db_study`.`tb_book` (`id` ,`bookname` ,`author`)VALUES ('6',  'php2',  '薛亚峰');
</pre>


























