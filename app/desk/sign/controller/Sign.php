<?php
namespace app\desk\sign\controller;

use app\api\common\controller\Common;
use app\api\student\logic\Enroll as enrollAPI;
use think\Request;

/**
 * 报名类
 * Class Sign
 * @author yanghuan
 * @datetime 2017/3/20 19:47
 * @package app\desk\sign\controller
 */
class Sign extends Common
{
    /**
     * 报名首页
     * @author:yanghuna
     * @datetime:2017/3/20 19:47
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }
    
    /**
     * @desc 微信端学员报名信息提交报名并保存
     * @return \think\response\Json
     */
    public function save(){
        $request = Request::instance();
        if ($request -> isPost()) {
            $data['stu_name'] = $request -> post('stu_name','','trim');
            $data['stu_sex'] = $request -> post('stu_sex','','trim');
            $data['stu_age'] = $request -> post('stu_age','','trim');
            $data['stu_phone'] = $request -> post('stu_phone','','trim');
            $data['stu_qq'] = $request -> post('stu_qq','','trim');
            $data['stu_xueli'] = $request -> post('stu_xueli');
            $data['stu_zhuanye'] = $request -> post('stu_zhuanye');
    
             
            $pri = new enrollAPI();
            $enroll = $pri -> save($data);
            if ($enroll) {
                return json(['code' => 0,'msg' => '添加学员成功']);
            }else {
                return json(['code' => 500001,'msg' => '添加学员失败']);
            }
        }
    }
    
}