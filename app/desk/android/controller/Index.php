<?php
namespace app\desk\android\controller;

use app\api\common\controller\Common;

/**
 * android开发类
 * Class Index
 * @author yanghuan
 * @datetime 2017/3/29 20:22
 * @package app\desk\sign\controller
 */
class Index extends Common
{
    /**
     * android开发栏目 首页
     * @author:yanghuna
     * @datetime:2017/3/29 20:22
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}