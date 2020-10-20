<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ImportTplModel extends Model
{
    //关联的数据表
    public $table = 'import_tpl';

    //    主键
    public $primaryKey = 'id';

    //    允许批量操作的字段
    //    public $fillable=['user_name','user_pass','email','phone'];
    //    不允许的
    public $guarded = [];

    //    是否维护create_at和update_at字段
    public $timestamps = false;
    //    软删除

    use SoftDeletes;

    //    禁用
    const STATUS_INACTIVE = 0;
    //    活跃
    const STATUS_ACTIVE = 1;

//    模板字段是否必填
    const TPL_IS_MUST = 1;
    const TPL_IS_NULL = 0;

    public function getDataSelect($map = [], $columns = ['*'], $order = 'id', $sort = 'asc')
    {
        $res = $this->where($map)->orderBy($order, $sort)->get($columns);
        return $res;
    }

    public function getDataList($map, $page = 10)
    {
        $res = $this->where($map)->latest()->paginate($page);
        return $res;
    }

    public function getDataInfo($id)
    {
        $res = $this->find($id);
        return $res;
    }

    public function getColumnsValue($map, $value)
    {
        $res = $this->where($map)->value($value);
        return $res;
    }

    public function getColumns($map = [], $col = ['*'])
    {
        $res = $this->where($map)->select($col)->get();
        return $res;
    }

    public function updateData($id, $update = [])
    {
        $res = $this->where('id', $id)->update($update);
        return $res;
    }

    public function deleteData($id)
    {
        $res = $this->where('id', $id)->delete();
        return $res;
    }

    public function insertData($data)
    {
        $res = $this->insertGetId($data);
        return $res;
    }

//        查询模板映射字段
    public function getTplField($map = [])
    {
        $res = DB::table('import_tpl_field')->where($map)->get();
        return $res;
    }
}
