<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImportLogModle extends Model
{
	//关联的数据表
	public $table = 'import_log';

	//    主键
	public $primaryKey = 'id';

	//    是否维护create_at和update_at字段
	public $timestamps = false;

	//    禁用
	const STATUS_INACTIVE = 0;
	//    活跃
	const STATUS_ACTIVE = 1;

	public function getList($map, $page = 10)
	{
		$res = $this->where($map)->paginate($page);
		return $res;
	}

	public function getListData($offset = 0, $limit = 10, $order = 'id', $sort = 'asc')
	{
		$res = $this->orderBy($order, $sort)->offset($offset)
			->limit($limit)
			->get();
		return $res;
	}

	public function insertData($data)
	{
		$res = $this->insertGetId($data);
		return $res;
	}

	public function insertImportExcelData($tableName,$data){
		$res = DB::table($tableName)->insert($data);
		return $res;
	}
	public function deleteData($id)
	{
		$res = $this->where('id', $id)->delete();
		return $res;
	}

	public function getDataInfo($id)
	{
		$res = $this->find($id);
		return $res;
	}

	public function updateData($id, $update = [])
	{
		$res = $this->where('id', $id)->update($update);
		return $res;
	}



}
