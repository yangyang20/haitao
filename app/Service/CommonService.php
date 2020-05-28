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


    public function getList($map=[]){
       $res =  $this->model->getList($map);
       return $res;
    }

    public function create($data){
        $res = $this->model->insertData($data);
        return $res;
    }

    public function getColumnsValue(){
        $res = $this->model->getColumnsValue();
    }
}
