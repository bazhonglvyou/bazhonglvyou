<?php
namespace app\api\common\controller;

use think\Controller;
use think\Session;
use think\Db;

/**
 * 后台-公共类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/8
 * Time: 11:29
 */
class Base extends Controller
{
    protected $userInfo = '';
    protected $auth = '';

    protected function _initialize()
    {
        if (Session::has('adminUser')) {

            $this->userInfo = Session::get('adminUser');

            //非系统管理员，需要验证权限
            if (!in_array($this->userInfo['type'], [0])) {
                $this->auth = $this->queryPrivilege();
            }

        } else {
            $this->redirect('login/login/');
        }
    }

    /**
     * 随机字符串
     * @param $length
     * @param string $chars
     * @return string
     * author: yanghuan
     * date:2017/3/12 18:01
     */
    public static function random($length, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz')
    {
        $hash = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }

    /**
     * 查询登录帐号具有的权限
     * author: yanghuan
     * date:2017/3/22 21:04
     */
    public function queryPrivilege()
    {
        $userId = $this->userInfo['id'];
        $result = Db::name('user_role')
            ->alias('ur')
            ->field('pri_code')
            ->join('__USER_PRIVILEGE__ up', 'ur.role_code=up.role_code', 'LEFT')
            ->where('user_id', $userId)
            ->select();
        if ($result) {
            foreach ($result as $item) {
                $auth[] = $item['pri_code'];
            }
            return $auth;
        }
        return false;
    }
}