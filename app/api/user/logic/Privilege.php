<?php

namespace app\api\user\logic;

use Tree\Tree;
use think\Db;

/**
 * 后台-权限管理类
 * Class Privilege
 * @package app\api\user\logic
 */
class Privilege
{
    /**
     * 权限列表
     * @author   liuke
     * @datetime 2017-02-06T11:57:10+0800
     * @param    array $result 数据集
     * @return   mixed               表格DOM结构
     */
    public function getTableDom($result = [])
    {
        if (empty($result)) {
            return false;
        }
        $tree = new Tree();
        $tree->icon = ['&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ '];
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';

        $htmlDom = "<tr>
                        <td class='text-center'>
                            <input type='checkbox' name='id[\$id]' value='\$listorder' class='i-checks'>
                        </td>
                        <td>
                            \$spacer &nbsp;\$name
                        </td>
                    </tr>";
        $tree->init($result);
        return $tree->get_tree(0, $htmlDom);
    }
}