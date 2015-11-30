<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<pre>
继承和多态：为了代码的重用。
	class subClass extends superClass{
		//subClass为子类。superClass为父类
		子类有构造方法则调用自己的，没有则调用父类的。
		
	}
</pre>
<?php
	class Sport5{
		public $name;
		public $age;
		public $av;
		public $sex;
		public function __construct($name,$age,$av,$sex){//js的construct一般不拿出来
			$this->name=$name;
			$this->sex=$sex;
			$this->age=$age;
			$this->av=$av;
		}
		function showMe(){
			echo "不会显示";
		}
	}
	class Beat1 extends Sport5{
		public $height;
		public $name;
		function __construct($name,$height){
			$this->height=$height;
			$this->name=$name;
		}
		function showMe(){
			return  "子类Beat1的showMe方法:".$this->height .$this->name;
		}
	}
	class Weight1 extends Sport5{
		public $name;
		function __construct($name){
			$this->name=$name;
		}
		function showMe(){
			return  "子类Weight1的showMe方法:".$this->name;
		}
	}
	
	
	$beatK=new Beat1("科技","190");//实例化子类
	$weightK=new Weight1("明日");
	echo $beatK->showMe()."<p>";
	echo $weightK->showMe()."<p>";
?>
<pre>
多态：虽然是同一个方法，却产生不同的形态。
	eg：一个method让大姐去游泳，有人带游泳圈，有人拿浮板，有人什么也不拿。
	多态有2中形势：
		覆盖：父类有的方法，子类进行重写了。。比如上面的那个例子。
		重载：不用为了对不同的参数类型或参数个数而写多个函数。
			  多个函数使用同一个名字，根据参数个数或参数类型不同自动调用对应的函数。
</pre>
<?php
	class C{
		function __call($name,$num){//调用不存在的方法 。。__call。。。必须写这个名字：__call
			echo "方法名：".$name."<p>";
			echo "参数个数：".count($num)."<p>";
			if(count($num)==1){//根据参数个数不同调用不同的方法
				echo $this->list1($a);
			}
			if(count($num)==2){//根据参数个数不同调用不同的方法
				echo $this->list2($a,$b);
			}
		}
		public function list1($a){
			return "this is List1 函数".$a."<p>";
		}
		public function list2($a,$b){
			return "this is List2 函数".$a.$b."<p>";
		}
	}
	$a=new C;
	$a->listshow(1,2);//奇怪，明明没有listshow。。这里与js不同。
?>

<pre>
$this：类内部使用。get_class()返回对象所属类的名字，若不是对象，则返回false。
    js中函数中有.name可返回名字。
		function aa(){ 
		   console.log(this.name);
		}
		var bb=aa;
		bb.name  就是aa
</pre>
<?php
	class example{
		function exam(){
			if(isset($this)){
				echo "$this值:".get_class($this);//输出$this所属类的名字
			}else{
				echo "$this未定义";	
			}
		}
	}
	$c1=new example();
	$c1->exam();// result: example
?>
<pre>
“::”可以在没有声明任何实例的情况下访问类中的成员访华或变量。
			关键字::变量名/常量名/方法名
			关键字：parent(调用父类的变量名/常量名/方法名)、self（当前类中）、类名（调用这个类的）
</pre>
<?php
	class Book{
		const name="computer";//常量
		function __construct(){//构造方法
			echo "输出默认值:".Book::name."<p>";
		}
	}
	class chinaB extends Book{
		const name="english";
		function __construct(){
			parent::__construct();//parent 调用父类的构造方法
			echo "self:".self::name;//self 调用本类的默认值
		}
	}
	$obj=new chinaB();
?>
<pre>
隐藏变量：
	public（公共成员）：在程序的任何外置（类内外）被其他的类和对象调用。
						 子类可以继承和使用父类中所有的公共成员。
	private(私有)：只能在所属类的内部被调用和修改，类外和子类都不可以。
	protected(保护成员):当前类、子类可用，其他类不可以。
</pre>
<?php
	class Books{
		private $name="123";
		public function setName($name){
			$this->name=$name;
		}
		public function getName(){
			return $this->name;
		}
	};
	class Lbook extends Books{
		
	};
	$lbook=new Lbook();
	$lbook->setName('10086');
	echo $lbook->getName();
	
	// echo Books::$name;//无法访问私有属性
?>
<?php
	class BookEn{
		protected $name="345";//什么保护变量$name;
	}
	class Lb2 extends BookEn{
		public function showMe(){
			echo "protected修饰的变量,子类中可以直接调用";
		}
	}
	$lbook=new Lb2();
	$lbook->showMe();
	// $lbook->name="history"; //"在其他地方不能调用，否则报错。";
?>
<pre>
静态成员static：1.不需要实例化对象 2.在对象被销毁后，仍然保存被修改的静态数据，以便其他地方调用。
	关键字::静态成员;
		关键字可以是： self，在类内部调用静态成员时所使用。
		静态成员所在的类名，在类外调用类内部的静态成员时所使用。
	在静态方法中，只能调用静态变量而不能调用普通变量；而普通方法则可以调用静态变量。	
</pre>
<?php
	class BookCN{
		static $num=0;//静态变量
		public function showMe(){
			echo "您是第 ".self::$num." 位访客<p>";//输出静态变量。
			self::$num++;
		}
	}
	$b1=new BookCN();
	$b1->showMe();
	
	$b2=new BookCN();
	$b2->showMe();
?>




<pre>
__call():为了避免当调用的方法不存在时产生错误，可以使用 __call() 方法来避免。
		该方法在调用的方法不存在时会自动调用，程序仍会继续执行下去。
语法：
function __call(string $fun_name, array $arguments){
    ......
}
两个参数，第一个参数 $fun_name接收不存在的方法名，$args 则以数组的方式接收不存在方法的多个参数。

在类中添加：
function __call($function_name, $args){
    echo "你所调用的函数：$function_name(参数：";
    var_dump($args);
    echo ")不存在！";
}
</pre>
<?php

$p1=new Person();
$p1->test(2,"test");
?>










































