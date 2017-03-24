<?php
namespace app\api\student\logic;
use think\Db;
/**
 * @desc 后台学生报名管理
 * @author Administrator
 *
 */
class Enroll{
    /**
     * @desc 学生报名列表
     * @return unknown
     */
    public function lists(){
        $enroll = Db::name('student') -> select();
        return $enroll;
    }
    
    public function save($data){
        $pri = Db::name('student') -> insertGetId($data);
        return $pri;
    }
}