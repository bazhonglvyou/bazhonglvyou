<?php

namespace app\console\user\controller;

use app\api\common\controller\Base;
use app\api\menu\logic\Menu as menuApi;
use app\api\user\logic\Privilege as privilegeApi;
use think\Request;

/**
 * 后台-会员-角色权限类
 * Class Privilege
 * @package app\console\user\controller
 */
class Privilege extends Base
{


    /**
     * 为角色添加权限
     * @author:yanghuna
     * @datetime: 2017/3/14 14:50
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * 权限列表
     * @author:yanghuna
     * @datetime:2017/3/14 15:27
     */
    public function lists()
    {
        $menu = new menuApi();
        $fields = 'id,name,listorder,icon,parent_id,status';
        $map = [
            'status' => ['in', '1,2'],
        ];
        $order = 'listorder desc';
        $result = $menu->getList($fields, $map, $order);

        // 生成树形DOM
        $pri = new privilegeApi();
        $list = $pri->getTableDom($result);
        $this->assign('list', $list);

        return $this->fetch();
    }
}