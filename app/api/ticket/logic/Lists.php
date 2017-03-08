<?php
namespace app\api\ticket\logic;
use think\Db;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/7
 * Time: 21:22
 */
class Lists
{
    public function queryList(){
        return Db::name('ticket')->find();
    }
}