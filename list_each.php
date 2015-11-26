<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form name="form2" method="post">
	 <div>添加投票选项:<textarea name="content" cols="30" rows="5"></textarea>
		<span>注意每个选项之间用*分割</span>
	 </div>
	 <div><input type="submit" value="submit" name="submit"/></div>
</form>

<?php
	if($_POST[submit]!=''){//submit与html中写的一致。【都小写好了】
		$content=$_POST[content];
		$data=explode("*",$content);
		while(list($name,$value)=each($data)){
			echo '<input type="checkbox" name="checkbox" value="checkbox" />';
			echo $value."\n";
		}
	}
?>
