<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class TokenGet extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'code'      =>      'require|isNotEmpty'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'code'      =>      '没有code,无法获取Token！'
    ];

    public function goCheck()
    {
    }
}

