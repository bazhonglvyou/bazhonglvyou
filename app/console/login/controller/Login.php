<?php
namespace app\console\login\controller;

use think\Controller;
use think\Request;
use think\Session;

/**
 * 后台-登录类
 * Created by PhpStorm.
 * User: yanghuan
 * Date: 2017/3/8
 * Time: 11:23
 */
class Login extends Controller
{
    public function index()
    {
        $request = Request::instance();
        if ($request->isPost()) {
            Session::set('adminUser', 1);
            $this->redirect('/' . APP_NAME . EXT);
        } else {
            return $this->fetch();
        }
    }
}