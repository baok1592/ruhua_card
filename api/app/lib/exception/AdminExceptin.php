<?php


namespace app\lib\exception;


class AdminExceptin extends BaseException
{
    public $code = 401;
    public $msg = '管理员不存在！';
    public $errorCode = 10001;
}