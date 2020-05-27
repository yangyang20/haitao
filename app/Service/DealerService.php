<?php
/**
 * @Time    : 2020/5/27 17:40
 * @Author  : yang
 * @Email   : 393622951@qq.com
 * @File    : DealerService.php
 * @Software: PhpStorm
 */

namespace App\Service;


use App\Model\admin\DealerModel;

class DealerService
{
    public $modle;

    public function __construct()
    {
        $this->modle = new DealerModel();
    }

    /**
     * 添加品牌方
     */
    public function createBrand($data){
//		todo 验证暂时没有


        $res = $this->modle->insertData($data);
        return $res;
    }

    /**
     * 修改品牌方
     */
    public function updateBrand($id,$data){
        $res = $this->modle->updateData($id,$data);
        return $res;
    }
}
