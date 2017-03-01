<?php
/**
 * Created by PhpStorm.
 * User: zdc
 * Date: 17-3-1
 * Time: 下午3:16
 */

namespace Home\Controller;


use Think\Controller;

class MysqlFunController extends Controller
{
	public function readFun(){
		$model = M('user');
		dump($model->select());

		echo '<br>';

		$model_e = M();
		$data = $model_e->query('select * from user');
		dump($data);

	}

	public function createFun(){
		$model = M('user');
		$data['name'] = 'yyy';
		$data['age'] = 11;
		$model->add($data);
		dump($model->select());
	}

	public function updateFun(){
		$model = M('user');
		$data['name'] = 'zzz';
		$data['age'] = 25;
		$model->where('id=1')->save($data);
		dump($model->select());

		$model_e = M();
		$model_e->execute('update user set name="iii" where id=2');
		$data = $model_e->query('select * from user');
		dump($data);
	}

	public function deleteFun(){
		$model = M('user');
		$model->where('name="yyy"')->delete();
		dump($model->select());
	}

}