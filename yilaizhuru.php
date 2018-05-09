<?php
//测试依赖注入
header("Content-Type:text/html;charset=utf-8");
//定义发送验证码接口
interface Mail{
	public function send();
}

class Email implements Mail{
	public function send(){
		//邮件发送验证码
		echo '则是邮件发送验证码';
	}
}


class SmsMail implements Mail{
	public function send(){
		//短信发送验证码
		echo '这是短信发送验证嘛、';
	}
}

//注册类
class Register {

	//注册操作
	public function doRegister(Mail $Mail){
		$Mail->send();
	}
}

$Register = new Register;


//如果用邮箱注册
$Email = new Email;

//如果用短信注册
$Email = new SmsMail;

$Register->doRegister($Email);
