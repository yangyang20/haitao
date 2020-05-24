<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    //关联的数据表
    public $table = 'admin_user';

//    主键
    public $primaryKey = 'id';

//    允许批量操作的字段
//    public $fillable=['user_name','user_pass','email','phone'];
//    不允许的
    public $guarded=[];

//    是否维护create_at和update_at字段
    public $timestamps = false;
//    软删除
    use SoftDeletes;
//    禁用
    const STATUS_INACTIVE=0;
//    活跃
    const STATUS_ACTIVE=1;

    /**
     * 验证用户
     * @param $userName
     * @param $passWord
     * @param string $lastIp
     * @return bool|string
     */
    public function checkUser($userName,$passWord,$lastIp=''){
        $user = $this->where(['user_name'=>$userName,'status'=>self::STATUS_ACTIVE])->first();

        try {
            if (empty($user)){
                throw new \Exception('该用户不存在');
            }

            if (decrypt($user['password']) !== $passWord){
                throw new \Exception('密码错误');
            }
            if ($lastIp){
                $this->where('id',$user['id'])->update(['last_login_ip'=>$lastIp]);
            }
//            dd($user);
            session(['user_info'=>$user]);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function getUserList($map,$page=10){
        $res = $this->where($map)->latest()->paginate($page);
        return $res;
    }

    public function getUserInfo($id){
        $res = $this->find($id);
        return $res;
    }

	public function getColumnsValue($map,$value){
		$res = $this->where($map)->value($value);
		return $res;
	}

    public function updateUser($id,$update=[]){
        $res = $this->where('id',$id)->update($update);
        return $res;
    }

    public function deleteUser($id){
        $res = $this->where('id',$id)->delete();
        return $res;
    }

    public function insertUser($data){
        $data['password'] = encrypt($data['password']);
        $res = $this->insertGetId($data);
        return $res;
    }
}
