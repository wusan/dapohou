<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form name="form2" method="post">
	 <div>用户名:<input name="user"/></div>
	  <div>密码:<input name="pwd" type="password"/></div>
	   <div><input type="submit" value="login" name="submit"/></div>
</form>

<?php
	while(list($name,$value)=each($_POST)){
		if($name!="submit"){
			echo "$name=$value<br>";
		}
	}
?>

