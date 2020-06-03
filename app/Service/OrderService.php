<?php
/**
 * @Time    : 2020/6/3 16:55
 * @Author  : yang
 * @Email   : 393622951@qq.com
 * @File    : OrderService.php
 * @Software: PhpStorm
 */

namespace App\Service;


use App\Model\admin\DealerModel;
use App\Model\admin\OrderModel;

class OrderService extends CommonService
{
    public function __construct()
    {
        $this->model = new OrderModel();
    }

    /**
     * 格式化数据
     */
    public function formatData(&$data){
        $dealerModel = new DealerModel();
        $data['dealer_name'] = $dealerModel->getColumnsValue([['id','=',$data['dealer_id']]],'name');
    }
}