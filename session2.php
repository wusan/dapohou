<?php
	session_start();
	$_SESSION['user']=$_POST['user'];
	$_SESSION['pwd']=$_POST['pwd'];
?>
<?php
	if($_SESSION['user']==''){
		echo "<script>alert('输入用户名');</script>";
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
	<form name="f1" action="session2.php" method="post">
		<p>用户名：<input type="" name="user" value="ycdeng" /></p>
		<p>密码：<input type="password" name="pwd" value="123456" /></p>
		<p><input type="submit" name="submit" value="提交" /></p>
		<p>超级用户：ycdeng 123456</p>
		<p>普通用户：other</p>
	</form>
	<?php
		if($_SESSION[user]=="ycdeng" && $_SESSION[pwd]=="123456"){
			echo "管理员";
		}else{
			echo "普通用户";
		}
	?>
	<ul>
		<?php
			if($_SESSION[user]=="ycdeng" && $_SESSION[pwd]=="123456"){
		?>
			<li style="color:#ff7300">用户管理..php后面输出了}。把if条件分成了2份。<a href="exit.php">退出登陆</a></li>
		<?php		
			}
		?>
		<li>首页</li><li>文章列表</li>
		<li>我的相册</li><li>修改密码</li>

	</ul>
</body>
