<?php
/**
 * @Time    : 2020/5/27 15:38
 * @Author  : yang
 * @Email   : 393622951@qq.com
 * @File    : BrandService.php
 * @Software: PhpStorm
 */

namespace App\Service;


use App\Model\admin\BrandModel;

class BrandService extends CommonService
{


    public function __construct()
    {
        $this->modle = new BrandModel();
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
