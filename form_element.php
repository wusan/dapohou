<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<style>
pre{color:orange;}
html,body,p{margin:0;padding:0;}
</style>
<pre>
	1.PHP参数传递常用的方法有3中:$_POST[] $_GET[] $_SESSION[],分别用于获取表单、url与Session变量的值.
		3个方法都是全局变量。$_POST['user']、$_GET['user']、$_SESSION['user']
		$_SESSION['user']也是获取表单元素的值
	2.PHP和js一样，可以随时在页面中编写< ? php ? >，类似于js在页面中随时编写< script></ script>
	3.include可以引用外部php include("index.php"); 
</pre>
	
<pre>include引入1.php：</pre>	
	<?php
		 include("1.php"); 
	?>
	
<pre>下面demo给input设置默认值：</pre>
	<?php
		$defaultVal="php输出的默认值";
	?>
	<input type="text" name="user" value="<?php echo $defaultVal; ?>" />
	
<pre>
获取表单数据，php都是通过表单元素的name属性获取相应的value属性值。
	1.PHP内部使用的key就是input的name名,要保持一致，且表单元素之间不要重复。
    2.复选框的name需要name+[],因为是多选  type="checkbox" name="chkbox[]";
	3.select如果多选，即设置了multiple则也需要 name="select[]";
	4.文件上传file：得到的是文件的路径。。若真正实现文件上传则需要设置< form enctype="multipart/form-data">
</pre>	
<form name="f1" method="post">
	<p>用户名:<input type="text" name="user"/><p>
	<p>密码:<input type="password" name="pwd"/><p>
	<p>
	   性别:<input type="radio" name="sex" value="男" checked />
		    <input type="radio" name="sex" value="女"/>
	
	<p>
	<p>
		兴趣：<span><input type="checkbox" name="checkB[]" value="篮球" />篮球</span>
				<span><input type="checkbox" name="checkB[]" value="足球" />足球</span>
				<span><input type="checkbox" name="checkB[]" value="乒乓球" />乒乓球</span>
	</p>
	<p>
	   国籍:<select name="country" id="">
				<option value="1china">china</option>
				<option value="2American">American</option>
				<option value="3japanese">japanese</option>
			</select>
	<p>
	<p>
	   去过的国家:<select name="countryGO" size="3">
				<option value="1china">china</option>
				<option value="2American">American</option>
				<option value="3japanese">japanese</option>
			</select>
	<p>
	<p>
	   想去的国家:<select name="countryWant[]" multiple>
				<option value="1china">china</option>
				<option value="2American">American</option>
				<option value="3japanese">japanese</option>
			</select>
	<p>
	<p>上传文件:<input type="file" name="fileA"/><p>	
	<p><input type="submit" name="submit" value="submit"/><p>	
</form>
<?php
	if($_POST[submit]=="submit"){
		echo "用户名：".$_POST[user]." 密码：".$_POST[user];
		echo "性别:".$_POST[sex];
		if($_POST[checkB]!=null){
			echo "兴趣：";
			for($i=0;$i<count( $_POST[checkB] );$i++){
				echo $_POST[checkB][$i]."&nbsp;" ;
			}
		}
		echo "国籍:".$_POST[country];
		
		if($_POST[countryGO]!=null){
			echo "去过的国家：";
			for($i=0;$i<count( $_POST[countryGO] );$i++){
				echo $_POST[countryGO][$i]."&nbsp;" ;
			}//返回值为1或2或3，而不是“1china”
		}
		if($_POST[countryWant]!=null){
			echo "想去的国家";
			for($i=0;$i<count( $_POST[countryWant] );$i++){
				echo $_POST[countryWant][$i]."&nbsp;" ;
			}//返回值为1或2或3，而不是“1china”
		}	
		echo " 文件路径：".$_POST[fileA];		
		
	}
?>
<pre>
url进行编码防止被用户看到传递的数据：
	编码 urlencode(url);
	解码：urldecode(url);

</pre>
</body>
