<?php
/**
 * @Time    : 2020/5/14 14:02
 * @Author  : yang
 * @Email   : 393622951@qq.com
 * @File    : DBCommon.php
 * @Software: PhpStorm
 */

namespace App\Tools;


use Illuminate\Support\Facades\DB;

class DBCommon
{
    /**
     *创建数据表
     */
    public static function createTable($tableName,$filterArr){
        $_name = env('DB_PREFIX').$tableName;
        $db_name=env('DB_DATABASE');
        $sql = " select TABLE_NAME from INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA='{$db_name}' and TABLE_NAME='{$_name}' ";
        $tableCheck = DB::select($sql);
        if ($tableCheck){
            throw new \Exception("数据表已存在，请联系技术");
        }
        $filterSql="";
        foreach ($filterArr as $filter){
            $filterSql.="`{$filter['filter']}` {$filter['type']}({$filter['length']}) {$filter['is_null']} COMMENT '{$filter['title']}',";
        }
        $db_charset=env('DB_CHARSET');
        $sql="CREATE TABLE `{$_name}` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `add_time` int(11) NOT NULL COMMENT '添加时间',
			  `add_uid` int(5) NOT NULL COMMENT '添加时间',
			  {$filterSql}
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET={$db_charset};
			";
        $sql = str_replace("\t",'',$sql);
        $sql = str_replace("\n",'',$sql);
        $res =  DB::statement($sql);

        return $res;
    }


    public static function alterTable($tableName,$filterArr){
	    $_name = env('DB_PREFIX').$tableName;
	    $db_name=env('DB_DATABASE');


	    $filterSql="";
	    foreach ($filterArr as $filter){
		    $sql="select count(*) as  _count from information_schema.columns where table_schema= '{$db_name}' and table_name = '{$_name}' and column_name = '{$filter['filter']}'";
		    $tableCheck = DB::select($sql);
		    if ($tableCheck[0]->_count){
			    throw new \Exception("字段{$filter['title']} {$filter['filter']}已存在，请联系技术");
		    }
		    $filterSql.="ADD `{$filter['filter']}` {$filter['type']}({$filter['length']}) {$filter['is_null']} COMMENT '{$filter['title']}',";
	    }
	    $filterSql = substr($filterSql,0,strrpos($filterSql,","));
	    $sql="alter table `{$_name}` {$filterSql}";
	    $sql = str_replace("\t",'',$sql);
	    $sql = str_replace("\n",'',$sql);
	    $res =  DB::statement($sql);
	    return $res;

    }
}
