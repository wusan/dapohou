<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	//基本变量。。

	echo '<h3>welcome to PHP world</h3>';//单行注释
	/*
	多行注释
	*/
	echo '<p>php中的变量类型是运行时根据上下文决定了，一开始是没有数据类型的</p>';
	$a1=false;
	if($a1){
		echo '变量为true';
	}
	else{
		echo '变量为false';
	}	
    $a2='<p>string来啦</p>';
    echo $a2; 
		
	//单引号中变量以字符方式直接输出。双引号可以将其作为变量输出
	 $a3='这是变量值';
	 echo '<p style="color:#ff7300">单引号$a3</p>';
	 echo "<p style='color:#ff7300'>双引号$a3</p>";
	$a4=300/123;
	$a5=0x123;//16进制
	echo '数字：',$a4,'-----16进制：',$a5;
	
	//数组
	$arr1=array('this','is','a','example');
	$arr1[4]='php';
	echo 'php数组:',$arr1,' [0]=',$arr1[0]," ";
	$b1=null;
	if(is_null($b1)){
		echo '<div>$b1=null</div>';
	}else{
		echo '<div>$b1!=null</div>';
	}
	$b2=300;
	$b21=(boolean)$b2;
	echo "<div>$b21</div>";
	//检查数据类型
	$b3=is_string('124');
	echo '检查数据类型,是否是布尔型:',$b3,'<br/>';
	define('donotChange',100);
	echo '常量输出：',donotChange;//书写时不需要$ ;
	echo '预定义常量:PHP版本',PHP_VERSION,' 文件路径：',__FILE__;
	
	//局部 全局 静态变量
	$example="在。。函数外";
	function exam(){
		$example="。。函数内..";
		echo '<br>exam函数,$example <br>';
	}
	exam();
	echo '函数外:',$example;
	function acc($num){//函数
		return "$num*$num=".$num*$num;
	}
	echo acc(10);
	
	function acc2(&$num){//函数 ..使用& 则将实参的内存地址传递过来。故函数外的$num值改变为新值。
		$num=$num*2;
		return "$num*$num=".$num;
	}
	$num=10;
	echo acc2($num),' num=',$num;
?>
