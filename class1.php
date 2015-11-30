<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<pre>
1.class+类名。
2.属性：存基础信息。  姓名，年龄、身高、体重
  方法：调用多个基础信息进行实现功能。
		选择：打篮球 （所有用户属性都调用。）
	
</pre>
<?php
	class SportObj{
		function beatBasketBall($name,$height,$av,$age,$sex){//声明成员方法
			echo "用户信息：".$name.$height.$av.$age.$sex."<p>";
			if($height>180 and $av<=100){
				return $name.",可以打篮球";
			}else{
				return $name.",不可以打篮球";
			}
		}
	}
	$sport=new SportObj();
	echo $sport->beatBasketBall("小小","185",'80','20岁',"男")."<p>";
?>
<pre>
3.实例化后调用对象方法: objectName -> 成员方法。	
objectName -> 成员变量。
4.[关键字 成员变量名]	关键字:public、private、protected、static、final  	

$this ->作用是调用本类中的成员变量或方法，后面的变量或方法没有$符号。

</pre>
<?php
	class SportO2{
		public $name;//定义成员变量
		public $height;
		public $av;
		public function beatBasketBall($name,$height,$av){//声明成员方法
			$this->name=$name;
			$this->height=$height;
			$this->av=$av;
			if($this->height>180 and $this->av<=100){
				return $name.",可以打篮球";
			}else{
				return $name.",不可以打篮球";
			}
		}
	}
	$sport2=new SportO2();//实例化类
	echo $sport2->beatBasketBall("小小","183",'82')."<p>";//执行方法和传参。
?>
<pre>
常量：const，不会改变的值。const PI=3.14159;
	常量输出不需要实例化对象：“类名::常量名” 调用即可。
</pre>
<?php
	class Sport3{
		const BOOK_TYPE="计算机图书";
		public $object_name;
		function setName($name){
			$this->object_name=$name;
		}
		function getName(){
			return $this->object_name;
		}
	}
	$c_book=new Sport3();
	$c_book->setName('PHP类');
	echo Sport3::BOOK_TYPE."->";
	echo $c_book->getName();
	/**
	result: 计算机图书->PHP类
	**/
?>
<pre>
构造方法：生成对象时自动执行的成员方法，作用：初始化对象。可以没有参数，也可有很多参数。
			类似js：new Obj("柳柳","30");然后设置属性值。
	语法：void__construct([arg,arg...]);		
析构方法：对象销毁时使用，作用：释放内存
	语法：void__cdestruct(void);	
	php一般自动清除不再使用的对象，释放内存，即不使用unset函数，析构方法也会自动被调用。
</pre>
<?php
	class SportO3{
		public $name;//定义成员变量
		public $height;
		public $av;
		public function __construct($name,$height,$av){//定义构造方法
			$this->name=$name;//为成员变量赋值
			$this->height=$height;
			$this->av=$av;
		}
		public function __destruct(){//自动调用析构函数
			echo "<p><b>对象被销毁，自动调用析构函数</b></p>";
		}
		public function beatBasketBall(){//这里不再有参数
			if($this->height>180 and $this->av<=100){
				return $this->name.",可以打篮球";
			}else{
				return $this->name.",不可以打篮球";
			}
		}
	}
	$sport2=new SportO3("小小","183",'82');//实例化类并初始化值【自动执行__construct】
	echo $sport2->beatBasketBall()."<p>";//执行方法
	//unset($sport2);//	php一般自动清除不再使用的对象，释放内存，即不使用unset函数，析构方法也会自动被调用。

?>











