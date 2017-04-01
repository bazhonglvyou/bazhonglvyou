<?php
namespace app\console\weixin\controller;

use app\api\common\controller\Base;
use think\Request;

/**
 * 后台-会员列表
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/12
 * Time: 17:26
 */
class Menu extends Base
{
    
    public function index()
    {
        return $this->fetch();
    }
}