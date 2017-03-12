<?php
namespace app\console\user\controller;

use app\api\common\controller\Base;
use app\api\user\logic\Lists as userList;
use app\api\user\validate\Lists as userValidate;
use think\Request;

/**
 * 后台-会员列表
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/12
 * Time: 17:26
 */
class Lists extends Base
{
    /**
     * 会员列表
     * @return mixed
     * author: yanghuan
     * date:
     */
    public function index()
    {
        $condition['type'] = ['neq', 0];
        $user = new userList();
        $userList = $user->lists($condition);
        $this->assign('userList', $userList);

        return $this->fetch();
    }

    /**
     * 添加会员
     * author: yanghuan
     * date:2017/3/12 17:58
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * 保存会员数据
     * author: yanghuan
     * date:2017/3/12 18:12
     */
    public function save()
    {
        $request = Request::instance();
        if ($request->isPost()) {
            $data['type'] = $request->post('type', '', 'trim');
            $data['user_name'] = $request->post('user_name', '', 'trim');
            $data['passalt'] = self::random(8);
            $data['password'] = $request->post('password', '', 'trim');
            $data['password_confirm'] = $request->post('password_confirm', '', 'trim');
            $data['create_time'] = date('Y-m-d H:i:s');

            // 数据校验
            $user = new userValidate();
            if (!$user->scene('save')->check($data)) {
                $result = ['code' => 500000, 'msg' => $user->getError(), 'data' => $data];
                return json($result);
            }

            unset($data['password_confirm']);
            $data['password'] = md5($data['password'] . $data['passalt']);

            $user = new userList();
            $userId = $user->add($data);
            if ($userId) {
                return ['code' => 0, 'msg' => '', 'data' => $userId];
            } else {
                return ['code' => 50000, 'msg' => '添加失败'];
            }
        }
    }
}