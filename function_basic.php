<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php	
	//函数。。还有点不清楚。。。


	//局部 全局 静态变量
	//1.普通函数
	$example="在。。函数外";
	function exam(){
		$example="。。函数内..";
		echo '<br>exam函数,$example <br>';
	}
	exam();
	echo '函数外:',$example;
	function acc($num){//函数..参数：$num
		return "$num*$num=".$num*$num.'<br>';
	}
	echo acc(10);//值传递
	//2 引用传递。使用&
	function acc2(&$num){//使用& 则将实参的内存地址传递过来。故函数外的$num值改变为新值。
		$num=$num*2;
		return "$num*$num=".$num;
	}
	$num=10;
	echo acc2($num),' num值变为：',$num.'<br>';
	/**
	3 可选参数：
		php中可选参数必须放在参数列表的最后，并设置值为空 ..否则报错
			function val2($num="",$price)
		若果设置了2个必填参数,但是调用时只写一个，则报错	
			function val2($price,$num){}
			val2(2);
	**/
	//
	function val2($price,$num=""){
		$total=$price+($price*$num);
		echo "价格：$total<br>";
	}
	val2(2,5);
	val2(2);
	//返回多个值
	function val3(){
		$arr1=array('1','2',3);
		return $arr;
	}
	echo '返回数组:'.val3();
	
	/**
	变量函数：通过变量名实现。在变量名后加(),php自动寻找与变量名相同的函数并执行。若找不到则报错。
		$f1="come";
		$f1();
		为什么报错：
			$f1="come";//函数
			$f1='ssss'//变成字符串
			就直接报错了。因为原先是fun现在变成字符串。。【js不会】
	变量函数:用于回调函数和函数表等		
	**/

	function come(){
		echo "<p>来啦come</p>";
	}
	function go($name='jack'){//设置默认值，无值时使用。有值时则用新值
		echo "<p>$name 走了</p>";
	}
	function back($string){
		echo "<p>又回来了,$string</p>";
	}
	$f1="come";
	$f1();
	
	$f2="go";
	$f2('Tom');$f2();
	
	$f3="back";
	$f3('Lily');
	
	//通过$a=&test()方式调用函数呢, 他的作用是　将return $b中的　$b变量的内存地址与$a变量的内存地址　指向了同一个地方 即产生了相当于这样的效果($a=&b;) 所以改变$a的值　
	
	//函数引用。需要 &+函数名。用来说明返回的是一个引用
	function &ac98($tmp=0){
		return "$tmp<p>";
	}
	$str2=&ac98('看到没，这是函数引用');//函数引用
	echo $str2;
	
	//取消引用 unset():断开变量名和变量内容之间的绑定，而不是销毁变量内容。
	$c1=123;
	$math=&$c1;//引用一下
	echo "mach:$math<br>";//123
	unset($math);//取消引用
	echo "mach:$math<br>"; //这里没有值输出。
	echo "c1值不变:$c1<br>";//123
?>
