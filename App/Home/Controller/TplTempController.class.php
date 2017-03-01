<?php
/**
 * Created by PhpStorm.
 * User: zdc
 * Date: 17-3-1
 * Time: 上午11:46
 */

namespace Home\Controller;


use Think\Controller;

class TplTempController extends Controller
{
	public function index(){
		$data = [
			'username' => 'zdc',
			'age' => 24,
		];

		$list = [
			[
				'type' => 1,
				'num' => 1,
			],
			[
				'type' => 2,
				'num' => 2,
			],
			[
				'type' => 3,
				'num' => 3,
			],
		];

		$name = 'zdc';

		$num = 10;
		$this->assign('name',$name);
		$this->assign('num',$num);
		$this->assign('list',$list);
		$this->assign('me',$data);
		$this->display();
	}

	public function redirectFun(){
		$this->redirect('index','',2,'jump');
	}

	public function successFun(){
		$this->success('success',U('User/index'));
	}

	public function errorFun(){
		$this->error('error',U('User/edit'));
	}

	public function ajaxReturnFun(){
		$this->ajaxReturn(getInfo(),'json');
	}

	public function IFun(){
		$server = I('server');
		dump($server);
	}

	public function debugFun(){
		echo C('name');
		$this->display();
	}


}