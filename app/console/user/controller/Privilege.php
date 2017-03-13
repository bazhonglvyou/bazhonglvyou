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
     * 会员列表
     * @author:yanghuna
     * @datetime:2017/3/13 19:32
     */
    public function userList()
    {
        $condition['type'] = ['neq', 0];
        $user = new userList();
        $userList = $user->lists($condition);
        return ['data' => $userList['list']];
    }

    /**
     * 保存数据
     * @author:yanghuna
     * @datetime:2017/3/13 15:29
     */
    public function save()
    {
        $request = Request::instance();
        if ($request->isPost()) {
            $data['user_id'] = $request->post('user_id', '', 'trim');
            $data['role_code'] = $request->post('role_code', '', 'trim');

            // 数据校验
            $pri = new priviliegeValidate();
            if (!$pri->scene('save')->check($data)) {
                $result = ['code' => 500000, 'msg' => $pri->getError(), 'data' => $data];
                return json($result);
            }

            foreach (explode(',',$data['user_id']) as $key => $item) {
                $userData[$key]['user_id'] = $item;
                $userData[$key]['role_code'] = $data['role_code'];
            }

            $pri = new privilegeApi();
            $role = $pri->addUser($userData);
            if ($role) {
                return ['code' => 0, 'msg' => '添加成功', 'data' => ''];
            } else {
                return ['code' => 500001, 'msg' => '添加失败', 'data' => ''];
            }
        }
    }
}