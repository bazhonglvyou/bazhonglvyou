<?php
namespace app\api\user\logic;

use think\Db;


/**
 * 后台-角色管理类
 * Class Role
 * @package app\api\user\logic
 */
class Role
{
    /**
     * 角色列表
     * @author:yanghuna
     * @datetime:2017/3/13 15:19
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function lists()
    {
        $pri = Db::name('role')->select();
        return $pri;
    }

    /**
     * 为角色添加会员
     * @author:yanghuna
     * @datetime:2017/3/13 15:20
     */
    public function add($data)
    {
        $pri = Db::name('user_role')->insertAll($data);
        return $pri;
    }

    /**
     * 查询角色，单条信息
     * @author:yanghuna
     * @datetime:2017/3/13 15:33
     * @param roleId 角色编号
     */
    public function queryRole($roleId)
    {
        $role = Db::name('role')->where('role_id', $roleId)->find();
        return $role;
    }

    /**
     * 查询角色具有的用户
     * @author:yanghuna
     * @datetime:2017/3/14 14:14
     */
    public function look($roleCode)
    {
        $userInfo = [];
        $userId = Db::name('user_role')->field('ur_id,user_id')->where('role_code', $roleCode)->where('status',0)->select();
        if ($userId) {
            foreach ($userId as $key => $ur) {
                $userInfo[$key]['ur_id'] = $ur['ur_id'];
                $userInfo[$key]['user_id'] = $ur['user_id'];

                $user = Db::name('user')->field('user_name')->where('id', $ur['user_id'])->find();
                $userInfo[$key]['user_name'] = $user['user_name'];
            }
        }
        return ['list' => $userInfo];
    }

    /**
     * 删除角色具有的用户
     * @author:yanghuna
     * @datetime:2017/3/14 14:33
     */
    public function del($urId)
    {
        return Db::name('user_role')->where('ur_id', $urId)->setField('status', 1);
    }
}