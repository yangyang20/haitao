<?php
/**
 * @Time    : 2020/5/27 17:54
 * @Author  : yang
 * @Email   : 393622951@qq.com
 * @File    : CommonService.php
 * @Software: PhpStorm
 */

namespace App\Service;


class CommonService
{
    public $model;
    public $error;

    //公共的增删改查

    public function getList($map, $page = 10)
    {
        $res = $this->model->where($map)->paginate($page);
        return $res;
    }

    public function getListData($offset = 0, $limit = 10, $order = 'id', $sort = 'asc')
    {
        $res = $this->model->orderBy($order, $sort)->offset($offset)
            ->limit($limit)
            ->get();
        return $res;
    }

    public function getInfoSelect($map = [], $columns = ['*'])
    {
        $res =  $this->model->where($map)->first($columns);
        return $res;
    }

    public function getInfo($id)
    {
        $res =  $this->model->find($id);
        return $res;
    }

    public function getColumnsValue($map,$value){
        $res =  $this->model->where($map)->value($value);
        return $res;
    }

    public function getColumns($map=[],$col=['*']){
        $res = $this->model->where($map)->select($col)->get();
        return $res;
    }

    public function insertData($data)
    {
        $res =  $this->model->insertGetId($data);
        return $res;
    }

    public function deleteData($id)
    {
        $res =  $this->model->where('id', $id)->delete();
        return $res;
    }

    public function updateData($id, $update = [])
    {
        $res =  $this->model->where('id', $id)->update($update);
        return $res;
    }
}
