<?php
/**
 * @Time    : 2020/5/9 17:46
 * @Author  : yang
 * @Email   : 393622951@qq.com
 * @File    : ExcelCommon.php
 * @Software: PhpStorm
 */

namespace App\Tools;



use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Facades\Excel;

class ExcelCommon
{
	/**
	 * 导入数据
	 *  返回数组
	 */
	public static function import($file){
		$array = Excel::toArray('',$file);
		if ($array){
			return $array[0];
		}
		return [];
	}

}
