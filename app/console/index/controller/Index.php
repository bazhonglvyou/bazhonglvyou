<?php
namespace app\console\index\controller;

use app\api\ticket\logic\Lists;

class Index
{
    public function index()
    {
        $l = new Lists();
        $a = $l->queryList();
        dump($a);
    }
}
