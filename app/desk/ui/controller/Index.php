<?php
namespace app\desk\ui\controller;

use app\api\common\controller\Common;

/**
 * UI设计类
 * Class Index
 * @author yanghuan
 * @datetime 2017/3/29 20:14
 * @package app\desk\sign\controller
 */
class Index extends Common
{
    /**
     * UI设计栏目 首页
     * @author:yanghuna
     * @datetime:2017/3/29 20:14
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}