<?php
namespace app\api\user\logic;

use think\Db;

/**
 * 后台-会员列表
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/12
 * Time: 17:35
 */
class lists
{
    /**
     * 会员列表
     * author: yanghuan
     * date:2017/3/12 17:38
     * @param $condition 搜索条件
     * @return Array
     */
    public function lists($condition = [])
    {
        $userList = Db::name('user')->where($condition)->select();
        return ['list' => $userList];
    }

    /**
     * 创建会员
     * @param $data
     * author: yanghuan
     * date:2017/3/12 17:54
     */
    public function add($data)
    {
        $userId = Db::name('user')->insertGetId($data);
        return ['id' => $userId];
    }
}