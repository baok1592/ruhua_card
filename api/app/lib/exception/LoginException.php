<?php


namespace app\lib\exception;


class LoginException extends BaseException
{
    public $code = 401;
    public $msg = '账号或密码不正确，请重新输入！';
    public $errorCode = 10001;
}