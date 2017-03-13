<?php

namespace app\console\user\controller;

use app\api\common\controller\Base;
use app\api\user\logic\Privilege as privilegeApi;
use app\api\user\validate\Privilege as priviliegeValidate;
use think\Request;

/**
 * 后台-会员-角色权限类
 * Class Privilege
 * @package app\console\user\controller
 */
class Privilege extends Base
{
    /**
     * 角色列表
     * @author:yanghuna
     * @datetime:2017/3/13 15:01
     */
    public function lists()
    {
        $pri = new privilegeApi();
        $role = $pri->lists();
        $this->assign('role', $role);
        return $this->fetch();
    }

    /**
     * 为角色添加会员
     * @author:yanghuna
     * @datetime:2017/3/13 15:16
     */
    public function addUser()
    {
        $request = Request::instance();
        $roleId = $request->get('roleid');
        if ($roleId) {
            $pri = new privilegeApi();
            $role = $pri->queryRole($roleId);
            $this->assign('role', $role);
            return $this->fetch();
        }
        return ['code' => 500001, 'msg' => '缺少roleid'];
    }

    /**
     * 保存数据
     * @author:yanghuna
     * @datetime:2017/3/13 15:29
     */
    public function save()
    {
        $data[] = '';
        // 数据校验
        $pri = new priviliegeValidate();
        if (!$pri->scene('add')->check($data)) {
            $result = ['code' => 500000, 'msg' => $pri->getError(), 'data' => $data];
            return json($result);
        }

        $pri = new privilegeApi();
        $role = $pri->addUser($data);
        $this->assign('role', $role);
    }
}