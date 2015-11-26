<form name="f1" method="post">
		<textarea name="a" id="" cols="10" rows="3" wrap="soft">我使用的是软回车！输出后不换行！</textarea>	
		<textarea name="b" id="" cols="10" rows="3" wrap="hard">我使用的是硬回车！输出后自动换行！</textarea>	
		<input type="submit" value="submit" />	
	</form>
	<?php
		echo nl2br($_POST[a])."<br>";//nl2br将换行符"\n" 替换成<br/>
		echo nl2br($_POST[b])."<br>";
	?>
