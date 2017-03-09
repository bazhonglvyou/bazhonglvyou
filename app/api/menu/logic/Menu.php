<?php
namespace app\api\menu\logic;

use think\Db;
use think\Model;
use Tree\Tree;
use think\Url;

/**
 * 后台-菜单设置
 * Created by PhpStorm.
 * User: yanghuan
 * Date: 2017/3/9
 * Time: 9:51
 */
class Menu extends Model
{
    /**
     * 获取列表
     * @author   yanghuan
     * @datetime 2017/3/9 9:53
     * @param    array $fields 字段
     * @param    array $map 筛选条件
     * @param    integer $page 页码
     * @param    integer $pageSize 每页数量
     * @param    array $order 排序条件
     * @return   array                列表
     */
    public function getList($fields = [], $map = [], $order = 'id asc')
    {
        return Db::name('menu')->field($fields)->where($map)->order($order)->select();
    }

    /**
     * 获取表格
     * @author   liuke
     * @datetime 2017-02-06T11:57:10+0800
     * @param    array      $result  数据集
     * @return   mixed               表格DOM结构
     */
    public function getTableDom($result = [])
    {
        if (empty($result)) {
            return false;
        }
        $tree       = new Tree();
        $tree->icon = ['&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ '];
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';

        $list = [];
        foreach ($result as $value) {
            $value['icon']   = $value['icon'] ? '<i class="fa fa-' . $value['icon'] . '"></i>' : '';
            $value['status'] = $value['status'] == 2 ? '<span class="label label-primary">显示</span>' : '<span class="label">不显示</span>';
            $value['manage'] = '
                <a href="' . Url('/setting/menu/create', ['parentid' => $value['id']], false, true) . '" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="添加子菜单">
                    <i class="fa fa-sort-amount-asc"></i>
                </a>
                <a href="' . Url('/setting/menu/edit', ['id' => $value['id']], false, true) . '" class="btn btn-primary btn-xs btn-circle" type="button" data-toggle="tooltip" data-placement="top" title="编辑">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="javascript:;" data-id="' . $value['id'] . '" class="btn btn-warning btn-xs btn-circle delete" type="button" data-toggle="tooltip" data-placement="top" title="删除">
                    <i class="fa fa-trash-o"></i>
                </a>';
            $list[] = $value;
        }
        $htmlDom = "<tr>
                        <td>
                            \$id
                        </td>
                        <td>
                            <input type='text' name='listorders[\$id]' value='\$listorder' class='form-control input-sm text-center'>
                        </td>
                        <td>
                            \$spacer \$icon&nbsp;\$name
                        </td>
                        <td>\$status</td>
                        <td>\$manage</td>
                    </tr>";
        $tree->init($list);
        return $tree->get_tree(0, $htmlDom);
    }

    /**
     * 获取树形结构数组
     * @author   yanghuan
     * @datetime 2017/3/9 10:14
     * @param    array      &$data   数据
     * @param    integer    $pid     父级ID
     * @param    integer    $level   层级
     * @return   array               树形数组
     */
    public static function getTree(&$data, $pid = 0, $level = 1)
    {
        $treeList = $items = [];
        foreach ($data as $k => $v) {
            if ($v['parent_id'] == $pid) {
                $v['url'] = Url::build($v['module'] . '/' . $v['controller'] . '/' . $v['action'], $v['parameter'], false, true);
                unset($v['module'], $v['controller'], $v['action'], $v['parameter']);
                unset($data[$k]);
                $items = self::getTree($data, $v['id'], $level + 1);
                // 后台菜单只支持三层，超出的层级不显示
                $items && $level < 3 && $v['items'] = $items;
                $treeList['menu_' . $v['id']]       = $v;
            }
        }
        return $treeList;
    }
}