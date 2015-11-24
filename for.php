<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php	
	//流程控制语句
	$num=rand(1,10);//rand(int min,int max) 生成随机整数  与js不同（Math.random() 0-1之间的数）
	//if
	if($num%2==0){
		echo "$num 是偶数";
	}else if($num<5){
		echo "$num 小于5";
	}else{
		echo "$num 大于5";
	}
	
	$month=date('n');
	$today=date('j');
	if($today>=1 and $today<=10){//使用and 而js为&&
		echo "今天是 $month 月 $today 日 上旬<p>";
	}else if($today>10 and $today<=20){
		echo "今天是".$month."月".$today."日中旬 <p>";
	}else{
		echo "今天是".$month."月".$today."日下旬 <p>";
	}
	
	//switch
	$num2=rand(1,5);
	switch($num2){
		case "1":
			echo "最新商品1<p>";
			include "2.php";//当前位置后插入新页面。
			break;
		case "2":
			echo "最新商品2<p>";
			//include "http://www.baidu.com";//载入不了。
			break;
		case "3":echo "最新商品3<p>";break;
		default:echo "没有商品<p>";break;
	}
	
	//while
	$num3=1;
	$str="10以为的偶数：";//必须加分号。否则导致后面的while报错。
	while( $num3 <= 10){
		if($num3%2==0){
			$str.=$num3."";//字符串连接竟然用“点”。。
		}
		$num3++;
	}
	echo $str;
	
	//do while
	$num5=1;
	do{
		echo 'do while出来喽<p>';
		$num5=2;
	}while($num5!=2);
	
	//for   for(;;)//无限循环。
	echo '<p style="color:#ff7300;">for while 奇数：<p>';
	for($k=1;$k<10;$k++){
		if($k%2==1){
			echo $k;
		}
	}
	
	//foreach
	echo '<p style="color:#ff7300;">使用索引值</p>';
	$arr=array('只能机器人','数码相机','瑞士手表');
	$price=array('12999元','2588元','3000元');
	foreach($arr as $key=>$value){//key为索引值，value为值
		echo "key:".$key.' value'.$value;
	}
	echo '<p style="color:#ff7300;">不使用索引值</p>';
	foreach($arr as $value){//value为值..
		echo 'value'.$value;
	}
	
	
	/**
	流程控制的简写:
		1.使用冒号代替左边的大括号
		2.使用endif、endwhile、endfor、endforeach和endswitch代替右边的大括号。
	**/
	echo '<p style="color:#ff7300;">不使用索引值..流程简写</p>';
	foreach($arr as $value):	//value为值..
		echo ' value:'.$value;
	endforeach;
	
	//break $num;指定$num要跳出几层循环。
	for($i=0;$i<10;$i++){
		echo '<br>';
		
	}
	
	
	$memberInfo = array();
	$memberInfo['username'] = "ycdeng";
	$memberInfo['truename'] = "嘟嘟";
	$memberInfo['age'] = 25;
	$memberInfo['url'] = "http://www.baidu.com";
	$memberInfo['hobby']['one'] = "developer";
	$memberInfo['hobby']['two'] = "coding";
	$memberInfo['hobby']['three'] = "学习";
	echo '输出json字符串，js使用的话还需要evel转换：'.json_encode($memberInfo);
?>
