<?php
namespace app\console\index\controller;

use app\api\common\controller\Base;

/**
 * 后台首页类
 * Class Index
 * @package app\console\index\controller
 */
class Index extends Base
{
    /**
     * 后台首页
     * @author:yanghuna
     * @datetime:2017/3/8 14:36
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}
