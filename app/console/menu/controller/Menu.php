<?php
namespace app\api\console\menu\controller;

use app\api\menu\logic\Menu as menuApi;
use think\Loader;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:54
 */
class Menu
{
    public function index()
    {
        $menu = new menuApi();
        $fields = 'id,name,listorder,icon,parent_id,status';
        $map = [
            'status' => ['in', '1,2'],
        ];
        $order = 'listorder desc';
        $result = $menu->getList($fields, $map, $order);

        // 生成树形DOM
        $list = $menu->getTableDom($result);

        // 模板赋值
        $this->assign('list', $list);
        return $this->fetch();
    }
}