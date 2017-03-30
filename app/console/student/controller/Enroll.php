<?php
namespace app\console\student\controller;
use app\api\student\logic\Enroll as enrollAPI;
use app\api\common\controller\Base;
use think\Request;
/**
 * @desc 学员报名类
 * @author Administrator
 */
class Enroll extends Base{
    /**
     * @desc 首页列表
     * @return mixed|string
     */
    public function index(){
        $enroll = new enrollAPI();
        $enrolls = $enroll -> lists();
        $this -> assign('enrolls',$enrolls);
        return $this -> fetch();
    }
    
    /**
     * 
     * @return mixed|string
     */
    public function add(){
        return $this->fetch();
    }
    
    /**
     * 
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