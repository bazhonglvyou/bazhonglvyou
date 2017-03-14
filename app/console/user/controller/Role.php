<?php
namespace app\console\user\controller;

use app\api\common\controller\Base;
use app\api\user\logic\Role as roleApi;
use app\api\user\validate\Role as roleValidate;
use app\api\user\logic\Lists as userList;
use think\Request;

/**
 * 后台-会员-角色权限类
 * Class Privilege
 * @package app\console\user\controller
 */
class Role extends Base
{
    /**
     * 角色列表
     * @author:yanghuna
     * @datetime:2017/3/13 15:01
     */
    public function lists()
    {
        $pri = new roleApi();
        $role = $pri->lists();
        $this->assign('role', $role);
        return $this->fetch();
    }

    /**
     * 为角色添加会员
     * @author:yanghuna
     * @datetime:2017/3/13 15:16
     */
    public function add()
    {
        $request = Request::instance();
        $roleId = $request->get('roleid');
        if ($roleId) {
            $pri = new roleApi();
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
            $pri = new roleValidate();
            if (!$pri->scene('save')->check($data)) {
                $result = ['code' => 500000, 'msg' => $pri->getError(), 'data' => $data];
                return json($result);
            }

            foreach (explode(',', $data['user_id']) as $key => $item) {
                $userData[$key]['user_id'] = $item;
                $userData[$key]['role_code'] = $data['role_code'];
            }

            $pri = new roleApi();
            $role = $pri->add($userData);
            if ($role) {
                return ['code' => 0, 'msg' => '添加成功', 'data' => ''];
            } else {
                return ['code' => 500001, 'msg' => '添加失败', 'data' => ''];
            }
        }
    }

    /**
     * 查看角色具有的用户
     * @author:yanghuna
     * @datetime:2017/3/14 14:11
     */
    public function look()
    {
        $request = Request::instance();
        $roleId = $request->get('roleid');
        if ($roleId) {
            $pri = new roleApi();
            $role = $pri->queryRole($roleId);

            $user = $pri->look($role['role_code']);
            $this->assign('user', $user);
            return $this->fetch();
        }
        return ['code' => 500001, 'msg' => '缺少roleid'];
    }

    /**
     * 删除角色具有的用户
     * @author:yanghuna
     * @datetime:2017/3/14 14:37
     */
    public function del()
    {
        $request = Request::instance();
        $urId = $request->get('urid');
        if ($urId) {
            $pri = new roleApi();
            $result = $pri->del($urId);
            return $result ? ['code' => 0, 'msg' => '删除成功'] : ['code' => 500002, 'msg' => '删除失败'];
        }
        return ['code' => 500001, 'msg' => '缺少urid'];
    }
}