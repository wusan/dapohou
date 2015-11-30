<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>


<pre>
fgets()：用于一次读取一行数据
fgetss():与fgets一样，但是会过滤掉html和php。fgetss(handle);	
</pre>



<div>读取本地php
	<?php
		$fopen=fopen('read.php','rb');
		while(!feof($fopen)){//feof()测试指针是否到了文件结束的位置
			echo fgets($fopen);//输出当场。
		}
		fclose($fopen);
	?>
	<?php
		$fopen=fopen('read.php','rb');
		while(!feof($fopen)){//feof()测试指针是否到了文件结束的位置
			echo fgetss($fopen);//输出当场。
		}
		fclose($fopen);
	?>
</div>

<pre>
fgetc():对文件中某一个字符查找、替换 fgets(handle);[测试未成功]
fread(handle,length):读取指定长度的数据
</pre>
	<?php
		$filename='aa.txt';
		$fp=fopen('aa.txt','rb');
		echo fread($fp,3);//输出文件前3个字节
		echo "<p>";
		echo fread($fp,filesize($filename));//输出文件剩余的内容。
		/**
		123
		456 789
		**/
	?>
<pre>
fwrite(handle,str[,length])：str数据写入文件.若指定了length，则写入length个字节后停止，若文件内容长度<length,则输出全部文件内容。
file_put_contents(filename,str[,flags]):它是fopen、fclose、fwrited的组合。
	注意：是替换掉原先的文件内容。
</pre>
	<?php
		$str2="今天天气好，我是写入的文件内容";
		$fileN='a2.txt';
		file_put_contents($fileN,$str2);
		readfile($fileN);
	?>

<pre>
php内置了大量文件操作函数：复制、删除、重命名。文件修改时间、大小等等。

<strong>13.2目录处理之后的东西还没有进行记录。。。。。。</strong>
</pre>
