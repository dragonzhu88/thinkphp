<?php
/**
 * Created by PhpStorm.
 * User: zdc
 * Date: 17-2-24
 * Time: 下午4:57
 */

namespace Home\Controller;


use Think\Controller;

class UserController extends Controller
{
	public function index(){
		echo "index";
		$this->display();
	}

	public function edit(){
		echo "edit";

	}

	public function login(){
		echo "login";
	}
}