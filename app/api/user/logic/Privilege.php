<?php

namespace app\api\user\logic;

use think\Db;

/**
 * 后台-权限管理类
 * Class Privilege
 * @package app\api\user\logic
 */
class Privilege
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
    public function addUser($data)
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
}