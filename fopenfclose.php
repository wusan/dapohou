<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<pre>
fopen(filename,mode[,include_path]);
	filename:包括相对、绝对路径。若没有任何前缀则打开的是本地文件
	mode：文件打开的方式.r:只读 r+:读写 a:追加（文件不存在则创建，文件存在则文件执行知道尾文件）
			W 只写（若有此文件，则删除文件内容，若无此文件则创建该文件）
			w+读写
fclose(handle):关闭文件
				$f_open=('a.txt','r');
				flose($f_open);
								
</pre>
<pre>
readfile:读入一个文件并写入缓存中。 readfile(filename);[fopen fclose的快捷方式，不需要打开和关闭文件]。
file()：读取文件内容(将文件内容按行存在数组中。foreach输出数组中每个元素)。
file_get_contents()：二进制文件内容读取。
</pre>

<div>读取本地文件aa.txt：
	<?php
		readfile("aa.txt");
	?>
</div>
<div>读取本地文件aa.txt[换行foreach]：<br/>
	<?php
		$f_arr=file("aa.txt");
		foreach($f_arr as $cont){//需要foreach输出
			echo $cont."<br>";
		}
		
	?>
	
</div>

<div>读取本地文件aa.txt（使用 file_get_contents ）：
	<?php
		$f_chr=file_get_contents("aa.txt");
		echo $f_chr;
	?>
</div>
<div>读取本地文件a.xls：读取失败。
	<?php
		readfile("a.xls");
	?>
</body>




