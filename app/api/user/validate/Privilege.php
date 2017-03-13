<?php
namespace app\api\user\validate;

use think\Validate;

/**
 * 后台-会员添加校验
 * @author   yanghuan
 * @datetime 2017/3/12 18:28
 */
class Privilege extends Validate
{
    protected $rule = [
        'role_code' => 'require',
        'user_id' => 'require',
    ];

    protected $message = [
        'role_code.require'=>'角色编码必须',
        'user_id.require'=>'会员编号必须',
    ];

    protected $scene = [
        'save' => ['role_code','user_id'], // 保存
    ];
}