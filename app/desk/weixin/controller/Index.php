<?php
namespace app\desk\weixin\controller;

use app\api\common\controller\Common;
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
        $type = $wx->getRev()->getRevType();
    }

    /**
     * 微信接入时，需用到的
     * @author yanghuan
     * @datetime 2017/3/24 21:40
     */
    private function checkWeixin()
    {
        $echostr = $this->request->get("echostr");
        if ($this->checkSignature()) {
            echo $echostr;
            exit;
        }
    }

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