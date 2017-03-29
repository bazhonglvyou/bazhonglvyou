<?php
namespace app\desk\html\controller;

use app\api\common\controller\Common;

/**
 * 前端与移动开发类
 * Class Index
 * @author yanghuan
 * @datetime 2017/3/29 20:18
 * @package app\desk\sign\controller
 */
class Index extends Common
{
    /**
     * 前端与移动开发栏目 首页
     * @author:yanghuna
     * @datetime:2017/3/29 20:18
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
}