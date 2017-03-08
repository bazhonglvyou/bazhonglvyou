<?php
namespace app\console\ticket\controller;

use app\api\common\controller\Base;
use app\api\ticket\logic\Lists as listsApi;

/**
 * 门票模块
 * Created by PhpStorm.
 * User: yanghuan
 * Date: 2017/3/8
 * Time: 21:58
 */
class Ticket extends Base
{
    /**
     * 门票列表
     * author: yanghuan
     * date:2017/3/8 22:17
     */
    public function lists()
    {
        $ticket = new listsApi();
        $ticketList = $ticket->queryList();
        dump($ticketList);
    }
}