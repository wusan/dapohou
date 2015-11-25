<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php	
	//字符串操作
	
	//1.
	echo "<p>a\rbc\tde\nfg</p>";//该结果需要通过“源文件”查看 :
	/**
		<p>a
		bc	de
		fg</p>
	**/
	
	//2.单引号内所有东西都作为字符输出，双引号的内容需要经过php语法分析器分析的,故变量会输出。
	$str="晴天";//在进入sql查询前，所有的字符串必须加单引号,以避免可入的注入漏洞和sql错误。
	echo 'today is $str<p>';
	echo "today is $str<p>";
	
	//3. 英文符号下的“.”是字符串连接符
	$str2=" yes!";
	$str2_1=$str.$str2;
	echo $str2_1;
	
	/**
	4.trim(str[,charlist]):去除字符串首尾空格和特殊字符,并返回结果
		charlist:若有此值,则删除这些字符。
		/0  null和空值。\x0B处置制表符  \t tab制表符 \r 回车符 \n换行符  ""空格 
	  ltrim(str[,charlist]):去除字符串左边的[注意是最左边。而不是字符串中间]
	  rtrim(str[,charlist]):去除字符串右边的
	**/
	$str3=" 	to	d\nay	";
	$str4=trim($str3);
	echo "trim($str3)<p>";//直接作为字符输出了。。双引号竟然只对变量有用，对method等没有用。
	echo "$str4<p>";
	$str5="@@)网站(:@@ ";
	$str5_1=ltrim($str5,"@@");
	$str5_3=rtrim($str5);//去掉最右侧的 空格之类的字符
	$str5_2=rtrim($str5_3,"@@");//去掉最右侧的 @@。。。。分2步去除。。
	echo "$str5_1<p>";
	echo "$str5_2<p>";
	
	//5.转义字符：紧跟在“\”后的第一个字符将变得没有意义或有特殊意义。
	echo 'Tom\'s';//转义字符输出单引号
	/**
	 addslashes(str,charlist) 函数:返回在预定义字符之前添加反斜杠的字符串 .
		1.预定义字符是：单引号（'）、双引号（"）、反斜杠（\）、NULL
		2.PHP 对所有的 GET、POST 和 COOKIE 数据自动运行 addslashes()
	 stripslashes(str):还原addslashes转义后的字符。
	**/
	$str7 =addslashes('Shanghai is the "biggest" city in China.<p>');
	echo $str7;
	$str6=stripslashes($str7);
	echo $str6;
	/**
	 addcslashes(str,charlist) 函数:返回在预定义字符之前添加反斜杠的字符串 .
		如果charlist包括\n \r等字符,将以C语言风格转换，其他非字母、数字且ascii码<32或ascii码>126的字符专为八进制显示。
	 stripcslashes():还addcslashes转义后的字符。
	**/
	$str7 =addcslashes('语言ab123<p>','b');
	echo $str7;
	$str6=stripslashes($str7);
	echo $str6;
	
	/**
	6. strlen:获取字符串长度。。（js为length）
	**/
	echo "长度为".strlen($str6)."<p>";
	
	/**
	7.substr(str,start[,length]):截取字符串长度
		start：截取字符串的位置,start<0,则从尾部开始。。start是从0开始计算的。
		length:截取字符的个数。若length<0,则表示到倒数第length个字符。
	**/
	$str8="abcdefg";
	echo "截取substr：".substr($str8,2)."<p>";
	echo "截取substr：".substr($str8,-3)."<p>";
	$str9="今天天气好适合外出";
	if(strlen($str9)>6){//1个汉字为2个字节。故截取substr中文时需要为偶数。
		echo "超出6个显示省略号：".substr($str9,6)."...<p>";
	}else{
		echo "正常显示：".$str9."<p>";
	}
	
	/**
	8.字符串比较：
		按照字节比较：strcmp()\strcasecmp()
		按照自然排序法比较：strnatcmp()
		从源字符串的位置开始比较:strncmp()
		
		strcmp(str1,str2):str1>str2则返回值大于0 反之小于0，相等则为0。strcasecmp不区分大小写【str case cmp】
		strnatcmp(str1,str2):比较字符串的数字部分。str2则返回值大于0 反之小于0，相等则为0。 注意：2>10.因为2>1.【str native(本地。计算机本地比较) cmp】
		strncmp(str1,str2,len):返回值同上。	注意：len是说明str1和str2中取几个字符进行比较。也就是截取len个字符串进行比较	【str number cmp】
	**/
	$str12="今天天气";
	$str13="今天天气!!!";
	echo strcmp($str12,$str13)."<p>";//-3 [小1个字节为-1，小2个为-2依次类推]
	$str12="今天12天气";
	$str13="今天34天气!!!";
	echo strnatcmp($str12,$str13)."<p>";//-1 
	$str12="1567";
	$str13="156";
	echo strncmp($str12,$str13,3)."<p>";//0
	echo strncmp($str12,$str13,4)."<p>";//1
	
	/**
	9.合并字符串:implode(str分隔符,array) 将数组的内容组合成一个新字符串，数组项之间用“str分隔符”进行连接。
	**/
	$str="今@天@天@气";
	$str_arr=explode('@',$str);
	echo $str_arr.json_encode($str_arr);
	$str_arr3=implode('#',$str_arr);
	echo $str_arr3."<p>";//今#天#天#气
	/**
	10.分割字符串:explode(str分隔符,str) 字符串分割成数组，通过“str分隔符”进行切割。
	**/	
	$str_arr5="today#is#Friday";
	echo json_encode( explode('#',$str_arr5) ) ."<p>";//["today","is","Friday"]
	/**
	11.数字格式化
	number_format(flaot[,num,str1,str2]);
		可以为1、2、4个参数，不能为3个参数
		若为1个参数，则四舍五入，且每3位以逗号分割
		若为2个参数，会格式化到小数点第num位，且每3位都以逗号分割
		若为4个参数，使用str1代替小数点，str2代替逗号。
	**/	
	$num1=123456789.923456789;
	echo number_format($num1)."<p>";//123,456,790
	echo number_format($num1,5)."<p>";//123,456,789.92346
	echo number_format($num1,6,"*","_")."<p>";//123_456_789*923457
	/**
	12.字符串替换
	str_ireplace(search,replace,subject,count);使用新字符串替换原串中被指定替换的字符串。
		search:要查找的字符串
		replace:替换的值
		subject:查找的范围
		count:获取执行替换的次数
		不区分大小写。
	**/	
	$str31="某某公司,今年某某怎么了，某某好，每人发了1袋某某苹果";	
	echo str_ireplace("某某","<span style='color:#ff7300;'>**</span>",$str31)."p";//**公司,今年**怎么了，**好，每人发了1袋**苹果p
	/**
	12-2:字符串替换
	substr_replace(str,replace,start[,length]);对指定字符串中的部分字符串进行替换
		str:原始字符串
		replace:替换后的新字符串
		start:开始的位置。start>0从字符串头部开始，start<0从字符串尾部开始。start=0表示字符串的第一个字符
		length:替换的长度.默认是整个字符串。length>0从字符串头部开始，length<0表示总尾部开始.length=0表示是插入而非替代
		区分大小写。
	**/	
	$str25="today is Friday";

	echo "<p>".substr_replace($str25,"once",2);//toonce
	echo "<p>".substr_replace($str25,"once",2,7);//toonceFriday
	echo "<p>".substr_replace($str25,"once",-2);//today is Fridonce
	echo "<p>".substr_replace($str25,"once",0);//once
?>
