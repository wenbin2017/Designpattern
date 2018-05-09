<?php
// 装饰器模式

/*如果已有对象的部分内容或功能性发生改变，但是不需要修改原始对象的结构或不使用继承，动态的扩展一个对象的功能，则应该使用装饰器模式。
简单点说：就是我们不应该去修改已有的类，而是通过创建另外一个装饰器类，通过这个装饰器类去动态的扩展其需要修改的内容，这样做的好处就是————
1、我们可以保证类的层次不会因过多而发生混乱。
2、当我们需求的修改很小时，不用改变原有的数据结构。*/

header("content-Type:text/html;charset=utf8");

//装饰器接口
interface Decotator{
	public function before();
	public function after();
}


//功能类
/**
* 输出一个字符串
* 装饰器动态添加功能
* Class EchoText
*/
class EchoText 
{
	protected $decotator = []; //装饰器数组
	public function index(){
		//给它加上装饰器前置操作
		$this->beforeList();
		echo '最初的功能';

		//给它加上装饰器后置操作
		$this->afterList();
	}

	//增加一个装饰器
	public function addDecotator(Decotator $decotator){
		$this->decotator[] = $decotator;
	}

	public function beforeList(){
		foreach ($this->decotator as $key => $value) {
			# code...
			$value->before();
		}
	}

	public function afterList(){
		// )
		foreach (array_reverse($this->decotator) as $key => $value) {
			# code...
			$value->after();
		}
	}

}

//实现装饰器
/**
* 增加输出装饰器1的操作
*/
class Decotatorone implements Decotator
{
	public function before(){
		echo '我是装饰器1的前置操作';
	}
	public function after(){
		echo '我是装饰器1的后置操作';
	}
}

/**
* 增加输出装饰器2的操作
*/
class Decotatortwo implements Decotator
{
	public function before(){
		echo '我是装饰器2的前置操作';
	}
	public function after(){
		echo '我是装饰器2的后置操作';
	}
}

//实例化功能类
$echoText = new EchoText();

//增加两个装饰器
$Decotatorone = new Decotatorone();
$Decotatortwo = new Decotatortwo();
$echoText->addDecotator($Decotatorone);
$echoText->addDecotator($Decotatortwo);

$echoText->index();