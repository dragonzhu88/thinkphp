<?php

/**
 * Created by PhpStorm.
 * User: zdc
 * Date: 17-3-1,
 * Time: 下午5:46
 */
class UserModel extends \Think\Model
{
	protected $_scope = [
		'great' => [
			'where' => [
				'age' => ['gt', 20],
			],
			'order' => 'id asc',
			'limit' => 10,
		],
		'less' => [
			'field' => 'name',
			'limit' => 5,
		]
	];
}