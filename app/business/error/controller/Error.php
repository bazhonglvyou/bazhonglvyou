<?php
namespace app\business\error\controller;

use think\Controller;

class Error extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}