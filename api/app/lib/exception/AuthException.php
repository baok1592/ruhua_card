<?php


namespace app\lib\exception;


class AuthException extends BaseException
{
    public $code = 406;
    public $msg = '没有操作权限！';
    public $errorCode = 10006;
}