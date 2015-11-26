<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	//数组操作
	
	/**
	1.简单数组
	**/		
	$arr1=array('This','car','is','red');
	print_r($arr1)."<p>";//Array ( [0] => This [1] => car [2] => is [3] => red )
	echo $arr1[1]."<p>";//取某个元素
	$arr1[4]="Like";
	echo $arr1[4]."<p>";//取某个元素
	
	/**
	2.关联数组：键名是数字和字符的混合。只要键名中有一个不是数字，那这个数据就是关联数组。
	**/
	$arr2=array("first"=>"this","second"=>"is");
	print_r($arr2)."<p>";//Array ( [first] => this [second] => is )
	echo $arr2['second']."<p>";// is
	/**
	3.输出数组：单个数组元素输出 echo和print.整个数组输出print_r
		print_r(expression);expression为普通整型、字符型或变量，直接输出。若为数组，则整体输出具体内容。
	**/
	print_r($arr1);//Array ( [0] => This [1] => car [2] => is [3] => red [4] => Like )
	
	/**
	4.二维数组:数组元素也是数组..与js完全不同 arr=[[1,2,3],[4,5,6]];
	**/	
	echo "<p>";
	$arr3=array(
		"book"=>array('文学','历史','地理'),
		"fruit"=>array('apple','orange','banana')
	);
	print_r ($arr3);//Array ( [book] => Array ( [0] => 文学 [1] => 历史 [2] => 地理 ) [fruit] => Array ( [0] => apple [1] => orange [2] => banana ) )
	echo "<p>";//如何取得二维数组的某个元素？
	//print_r $arr3["book"];失败。
	
	/**
	5.遍历数组:
		foreach 操作的不是数组本身而是数组的副本。
		list():把数组的值赋给一些变量。只能用于数字索引的数组,且从索引0开始。
			list(var1[,var2...]):var1第一个需要赋值的变量 .va2可选。可以有多个变量.
			感觉是给数组项另起别名。
		each(array)：生成一个由数组当前内部指针所指向的元素的键名和键值组成的数组，并把内部指针向前移动。
			返回的数组中包括的四个元素：键名为 0，1，key 和 value。
				单元 0 和 key 包含有数组单元的键名，1 和 value 包含有数据。
				如果内部指针越过了数组范围，本函数将返回 FALSE。
	**/	
	$arr1=array('This','car','is','red');
	foreach($arr1 as $item){//foreach语法。
		echo $item."<br>";
	}
	/**
	This
	car
	is
	red
	**/
	list($a,$b,$c)=$arr1;
	echo "list():"."$a $b $c";//This car is
	
	echo "<p>";
	$people = array("Peter", "Joe", "Glenn", "Cleveland");
	print_r (each($people));//Array ( [1] => Peter [value] => Peter [0] => 0 [key] => 0 )
	
	echo "<p>";
	$people = array("Peter", "Joe", "Glenn", "Cleveland");
	while (list($key, $val) = each($people)) {//each和list结合使用
		echo "$key => $val<br />";
	}
	/**
	0 => Peter
	1 => Joe
	2 => Glenn
	3 => Cleveland
	**/
	
	/**
	6.数组去重：array_unique(array):将数组元素的值作为字符串排序，然后对每个值只保留第一个键名，忽略所有后面的键名。
	**/
	$arr2= array("Peter", "Joe", "Glenn", "Cleveland");
	array_push($arr2, "Joe", "Glenn");//添加元素
	print_r($arr2);//Array ( [0] => Peter [1] => Joe [2] => Glenn [3] => Cleveland [4] => Joe [5] => Glenn )
	echo "<br>";
	$result=array_unique($arr2);
	print_r ($result);//Array ( [0] => Peter [1] => Joe [2] => Glenn [3] => Cleveland ) 
	echo "<br>";
	
	/**
	7.添加数组元素：array_push():添加到数组末尾，返回数组新长度。
			array_push(array,va1[,va2]);
	**/	
	$arr1=array('This','car');
	$len=array_push($arr1,'3','5');
	print_r ($len);//4
	echo "<br>";
	print_r ($arr1);//Array ( [0] => This [1] => car [2] => 3 [3] => 5 )
	
	/**
	8.弹出数组最后一个元素：array_pop(array),返回最后一个数组元素且数组长度-1。如果数组为空或不是数组则返回null.
	**/	
	echo "<br>";
	$arr1=array('This','car');
	$len=array_pop($arr1);
	print_r ($len);//car
	echo "<br>";
	print_r ($arr1);//Array ( [0] => This )
	
	/**
	9.统计数组个数：count(array)
	**/	
	echo "<br>";
	echo "数组长度 ".count($arr1);//数组长度 1
	
	/**
	10.array_search(val,array[,strict])：数组中查找指定值，找到返回键明，否则返回false。
		val:要查找的值，array:数组
		strict:可选。默认为false 。若为true则值和类型都要检查。即false时，值相同==。true类型和值都要相同===
	**/	
	echo "<br>";
	$arr3=array("a1"=>"dog","b2"=>"cat","c3"=>"horse");
	echo array_search("dog",$arr3)."<p>";//a1..返回“键名”   值一样（==）
	$arr4=array("a2"=>"5","b2"=>5,"c2"=>"5");
	echo array_search(5,$arr4,true)."<p>";//b2..值和类型都要一样。（===）
	/**
	10.字符串和数组键的转换
		explode(分割符,str[,limit]):把字符串打散为数组[类似于js的str.split('')] 
			分割符：不可为空"" ，否则报错。print_r (explode('',$str));
			        js可以哦。【"sss33".split()---["sss33"]】
					
			limit>0返回最多limit个元素的数组  （即若有10个，limit=5，则只显示前5个）
			limit=0返回一个元素的数组
			limit<0 返回包含除了最后 -limit个元素意外的所有数组。（即若有10个，limit=-5，则显示前5个，后面5个不显示）
		implode(分割符,array):数组内容专为字符串
			分割符:数组项之间连接成字符串中间的分割符。
	**/	
	echo "<br>";
	$str="时装、休闲、美女、咖啡、萝莉";
	$str2=explode('、',$str);
	print_r ($str2);//Array ( [0] => 时装 [1] => 休闲 [2] => 美女 [3] => 咖啡 [4] => 萝莉 ) 
	echo "<br>";
	print_r (implode('&',$str2));//时装&休闲&美女&咖啡&萝莉
	
?>
