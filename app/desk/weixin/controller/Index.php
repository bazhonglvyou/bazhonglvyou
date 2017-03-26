<?php
namespace app\desk\weixin\controller;

use app\api\common\controller\Common;
use app\api\weixin\logic\WxUser;
use think\Cache;
use Weixin\Weixin;

/**
 * 微信类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/24
 * Time: 21:17
 */
class Index extends Common
{
    /**
     * 微信接口入口文件
     * @author yanghuan
     * @datetime 2017/3/24 21:45
     * @return mixed
     */
    public function index()
    {
        $options = array('token' => '1354717176', 'appid' => 'wx7271dd3df7a03d6a', 'appsecret' => '976268b8286ebb103fc49e926636ef8d');
        $wx = new Weixin($options);
        $type = $wx->getRev()->getRevType(); //关注类型
        $event = $wx->getRev()->getRevEvent(); //关注事件
        $fromOpenid = $wx->getRev()->getRevFrom(); //关注者openid

        switch ($type) {
            case 'event':
                switch ($event['event']) {
                    case 'subscribe':
                        //获取接口凭证
                        $wx->checkAuth();
                        //获取关注者详细信息
                        $userInfo = $wx->getUserInfo($fromOpenid);
                        //实例化微信会员模型
                        $wxUser = new WxUser();
                        //会员是否已关注
                        $exist = $wxUser->exist($userInfo['openid']);
                        if ($exist) {
                            $wxUser->edit($userInfo, $exist);
                            $wx->text("亲，你已关注成功!")->reply();
                        } else {
                            $wxUserId = $wxUser->add($userInfo);
                            if ($wxUserId) {
                                $wx->text("亲，你已关注成功!")->reply();
                            } else {
                                $wx->text("亲，关注出现异常啦-_-，请取消重新关注!")->reply();
                            }
                        }
                        break;
                }
                break;
            default:
                $wx->text("help info")->reply();
                break;
        }
    }

    /**
     * 微信接入时，需用到的
     * @author yanghuan
     * @datetime 2017/3/24 21:40
     */
    /*public function index()
    {
        $echostr = $this->request->get("echostr");
        if ($this->checkSignature()) {
            echo $echostr;
            exit;
        }
    }*/

    /**
     * 微信接入时，验证获取微信请求过来的参数
     * @author yanghuan
     * @datetime 2017/3/24 21:40
     * @return bool
     */
    private function checkSignature()
    {
        $signature = $this->request->get("signature");
        $timestamp = $this->request->get("timestamp");
        $nonce = $this->request->get("nonce");

        $token = '1354717176';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}