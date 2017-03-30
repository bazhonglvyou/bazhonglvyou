<?php
namespace app\desk\hadoop\controller;

use app\api\common\controller\Common;

/**
 * 云计算之大数据类
 * Class Index
 * @author yanghuan
 * @datetime 2017/3/29 20:20
 * @package app\desk\sign\controller
 */
class Index extends Common
{
    /**
     * 云计算之大数据栏目 首页
     * @author:yanghuna
     * @datetime:2017/3/29 20:20
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}