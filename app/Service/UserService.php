<?php
/**
 *
 * User: yang
 * Date: 2020/6/3
 * Email: <393622951@qq.com>
 */


namespace App\Service;


use App\Model\admin\UserModel;

class UserService extends CommonService
{

	public function __construct()
	{
		$this->model = new UserModel();
	}

	/**
	 * 创建用户
	 */
	public function createUser($data){
		$data['add_uid'] = session('user_info.id');
		$res = $this->model->insertUser($data);
		return $res;
	}
}