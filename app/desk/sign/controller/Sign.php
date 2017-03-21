<?php
namespace app\desk\sign\controller;

use app\api\common\controller\Common;

/**
 * 报名类
 * Class Sign
 * @author yanghuan
 * @datetime 2017/3/20 19:47
 * @package app\desk\sign\controller
 */
class Sign extends Common
{
    /**
     * 报名首页
     * @author:yanghuna
     * @datetime:2017/3/20 19:47
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}