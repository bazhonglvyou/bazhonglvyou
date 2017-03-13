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
        'roleid' => 'require|number',
    ];

    protected $message = [
        'roleid.require' => 'id必须',
        'roleid.number' => 'id类型不正确',
    ];

    protected $scene = [
        'add' => ['role_id'], // 创建
    ];
}