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
}