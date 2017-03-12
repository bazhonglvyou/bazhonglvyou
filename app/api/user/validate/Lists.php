<?php
namespace app\api\user\validate;

use think\Validate;

/**
 * 后台-会员添加校验
 * @author   yanghuan
 * @datetime 2017/3/12 18:28
 */
class Lists extends Validate
{
    protected $rule = [
        'id' => 'number',
        'type' => 'require',
        'user_name' => 'require|length:2,10',
        'password' => 'require|length:5,20|confirm',
    ];

    protected $message = [
        'id.number' => '缺少ID',
        'type.require' => '会员类型必选',
        'user_name.require' => '会员帐号必填',
        'user_name.length' => '会员帐号必须2-10个字符之内',

        'password.length' => '密码必须5-20个字符之内',
        'password.comfirm' => '两次密码输入不一致',
    ];

    protected $scene = [
        'save' => ['type', 'user_name', 'password', 'password_confirm'], // 创建
        'update' => ['type', 'user_name', 'password', 'password_confirm'], // 更新
    ];
}