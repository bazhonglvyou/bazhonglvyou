<?php
namespace app\desk\sign\controller;

use app\api\common\controller\Common;
use app\api\student\validate\Enroll as enrollValidate;
use app\api\student\logic\Enroll as enrollAPI;
use think\Request;

/**
 * 学生-报名类
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
     * 微信端学生报名信息提交报名并保存
     * @author:yanghuna
     * @datetime:2017/3/28 11:27
     * @return array|\think\response\Json
     */
    public function save()
    {
        $request = Request::instance();
        if ($request->isPost()) {
            $data['stu_name'] = $request->post('stu_name', '', 'trim');
            $data['stu_sex'] = $request->post('stu_sex', '', 'trim');
            $data['stu_age'] = $request->post('stu_age', '', 'trim');
            $data['stu_phone'] = $request->post('stu_phone', '', 'trim');
            $data['stu_qq'] = $request->post('stu_qq', '', 'trim');
            $data['stu_xueli'] = $request->post('stu_xueli');
            $data['stu_zhuanye'] = $request->post('stu_zhuanye');

            //检验数据格式
            $enrollValidate = new enrollValidate();
            if (!$enrollValidate->scene('save')->check($data)) {
                return ['code' => 50000, 'msg' => $enrollValidate->getError()];
            }

            $pri = new enrollAPI();
            $enroll = $pri->save($data);
            if ($enroll) {
                return json(['code' => 0, 'msg' => '添加学员成功']);
            } else {
                return json(['code' => 500001, 'msg' => '添加学员失败']);
            }
        }
    }

}