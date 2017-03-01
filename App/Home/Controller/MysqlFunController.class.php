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
	public function readFun()
	{
		$model = M('user');
		dump($model->order('age desc,id desc')->select());


		echo '<br>';
		$model = M('user');
		dump($model->field('id,name')->order('age desc,id desc')->select());

		echo '<br>';
		$model = M('user');
		dump($model->field('id,name')->order('age desc,id desc')->limit(1, 3)->select());

		echo '<br>';
		$model = M('user');
		dump($model->field('id,name')->order('age desc,id desc')->page(1, 2)->select());

		echo '<br>';
		$model = M('user');
		dump($model->field('age,count(*) as total')->having('age>20')->group('age')->select());

		echo '<br>';

		$where['id'] = 2;
		$where['name'] = 'ff';
		$where['_logic'] = 'or';
		$data = $model->where($where)->select();
		dump($data);
		echo '<br>';

//		$where['id'] = ['lt', 2];
//		$where['name'] = ['like', ['%f']];
		$where['id'] = [
			['gt', 1], ['lt', 3], 'or'
		];
		$data = $model->where($where)->select();
		dump($data);
		echo '<br>';

		$data = M('user')->count();
		echo $data;
		echo '<br>';

		$data = M('user')->min('id');
		echo $data;
		echo '<br>';

		$data = M('user')->max('id');
		echo $data;
		echo '<br>';

		$data = M('user')->avg('age');
		echo $data;
		echo '<br>';

		$data = M('user')->sum('age');
		echo $data;
		echo '<br>';

		$data = M('user')->distinct(true)->field('age')->order('id desc')->select();
		dump($data);
		echo '<br>';

		echo '<br>';
		$model_e = M();
		$data = $model_e->query('select * from user');
		dump($data);

	}

	public function multReadFun()
	{
		$data = M()->table([
			'user' => 'user', 'acount' => 'acount'
		])->where('user.id=acount.id')->select();
		dump($data);

		echo "<br>";
		$data = M('user')->join('join acount On acount.id=user.id')->select();
		dump($data);

		echo "<br>";
		$data = M('user')->field('name,id')->union('select name,id from acount')->select();
		dump($data);

		echo "<br>";
		$data = M('user')->field('name')->union([
			'field' => 'name', 'table' => 'acount'
		])->select();
		dump($data);
	}

	public function createFun()
	{
		$model = M('user');
		$data['name'] = 'yyy';
		$data['age'] = 11;
		$model->add($data);
		dump($model->select());
	}

	public function createAllFun()
	{
		$model = M('user');
		$data = [
			[
				'name' => 'ggg',
				'age' => 66,
			],
			[
				'name' => 'gg',
				'age' => 6666,
			],
			[
				'name' => 'g',
				'age' => 666,
			],
		];
		$model->addAll($data);
		dump($model->select());
	}

	public function updateFun()
	{
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

	public function deleteFun()
	{
		$model = M('user');
		$model->where('name="yyy"')->delete();
		dump($model->select());
	}

}