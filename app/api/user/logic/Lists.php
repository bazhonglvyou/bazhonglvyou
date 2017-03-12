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

    /**
     * 删除会员
     * @param $id
     * author: yanghuan
     * date:2017/3/12 19:37
     */
    public function del($id)
    {
        $userId = Db::name('user')->where('id', $id)->delete();
        return ['id' => $userId];
    }

    /**
     * 查询单条会员数据
     * author: yanghuan
     * date:2017/3/12 19:44
     */
    public function find($id)
    {
        $user = Db::name('user')->where('id', $id)->find();
        return ['user' => $user];
    }

    /**
     * 编辑会员
     * @param $data
     * author: yanghuan
     * date:2017/3/12 19:56
     */
    public function edit($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $userId = Db::name('user')->where('id', $id)->update($data);
        return ['id' => $userId];
    }

}