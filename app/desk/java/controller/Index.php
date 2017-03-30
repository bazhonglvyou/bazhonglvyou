<?php
namespace app\desk\java\controller;

use app\api\common\controller\Common;

/**
 * JAVAEE开发类
 * Class Index
 * @author yanghuan
 * @datetime 2017/3/29 20:16
 * @package app\desk\sign\controller
 */
class Index extends Common
{
    /**
     * JAVAEE开发栏目 首页
     * @author:yanghuna
     * @datetime:2017/3/29 20:16
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}