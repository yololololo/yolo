<?php
class ValidateCode
{
	public $font='../static/font/msyh.ttf';//字体文件完整路径
	public $data='asdghkimubncus1234567890';//随机因子
	public $code;//验证码
	public $img;//句柄
	public $width=90;//图像宽度
	public $height=50;//图像高度
	public $fontsize=18;//字体大小

	//获取4个的随机码
	public function createCode(){
		for($i=0;$i<4;$i++){
			$this->code.=substr($this->data,rand(0,strlen($this->data)-1),1);
		}
	}

	//生成背景(浅色)
	public function createBg(){
		$this->img=imagecreatetruecolor($this->width,$this->height);
		$color=imagecolorallocate($this->img,rand(157,255),rand(157,255),rand(157,255));
		imagefill($this->img,0,0,$color);
	}

	//将随机码写入图像（深色）
	public function setCode(){
		$codelen=strlen($this->code);
		$content=str_split($this->code);
		for($i=0;$i<$codelen;$i++){
			
			$w=($this->width/$codelen)*$i+rand(1,5);
			$h=$this->height/1.4;
			$fontcolor=imagecolorallocate($this->img,rand(0,156),rand(0,156),rand(0,156));
			$content;
			imagettftext($this->img,$this->fontsize,0,$w,$h,$fontcolor,$this->font,$content[$i]);
		}
	}

	//// 输出干扰点（深色）
	public function setPixel(){
		for($i=0;$i<200;$i++){
			$color=imagecolorallocate($this->img,rand(0,156),rand(0,156),rand(0,156));
			imagesetpixel($this->img,rand(0,$this->width),rand(0,$this->height),$color);
		}
	}


	//输出干扰线
	public function setLine(){
		for($i=0;$i<4;$i++){
			$color=imagecolorallocate($this->img,rand(0,156),rand(0,156),rand(0,156));
			imageline($this->img,rand(0,$this->width),rand(0,$this->height),rand(0,$this->width),rand(0,$this->height),$color);
		}
	}

	//输出
	public function output(){
		header("content-type:image/png");

		imagepng($this->img);
		imagedestroy($this->img);
	}
    
    //将验证码存入session
	public function saveCode(){
		session_start();
		$_SESSION['code']=strtolower($this->code);
	}
	//对外生成
	public function run(){
		$this->createCode();
		$this->createBg();
		$this->setCode(); 
		$this->setPixel();
		$this->setLine();
		$this->saveCode();
		$this->output();
	}

	
	
	




}
$V=new ValidateCode();
$V->run();
