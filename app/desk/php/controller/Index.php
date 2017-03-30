<?php
namespace app\desk\php\controller;

use app\api\common\controller\Common;

/**
 * PHP开发类
 * Class Index
 * @author yanghuan
 * @datetime 2017/3/29 19:57
 * @package app\desk\sign\controller
 */
class Index extends Common
{
    /**
     * PHP开发栏目 首页
     * @author:yanghuna
     * @datetime:2017/3/29 19:58
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}