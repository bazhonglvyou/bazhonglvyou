<?php
namespace app\api\common\controller;

use think\Controller;
use think\Session;

/**
 * 后台-公共类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/8
 * Time: 11:29
 */
class Base extends Controller
{
    protected function _initialize()
    {
        if (Session::has('adminUser')) {
            $this->userInfo = Session::get('admin_user');
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
}