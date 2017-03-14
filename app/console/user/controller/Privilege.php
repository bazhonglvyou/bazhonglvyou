<?php

namespace app\console\user\controller;

use app\api\common\controller\Base;
use app\api\user\logic\Privilege as privilegeApi;
use app\api\user\validate\Privilege as priviliegeValidate;
use app\api\user\logic\Lists as userList;
use think\Request;

/**
 * 后台-会员-角色权限类
 * Class Privilege
 * @package app\console\user\controller
 */
class Privilege extends Base
{


    /**
     * 为角色添加权限
     * @author:yanghuna
     * @datetime: 2017/3/14 14:50
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * 权限列表
     * @author:yanghuna
     * @datetime:2017/3/14 15:27
     */
    public function lists()
    {
        return $this->fetch();
    }
}