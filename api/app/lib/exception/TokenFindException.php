<?php


namespace app\lib\exception;


class TokenFindException extends BaseException
{
    public $code = 401;
    public $msg = 'token令牌中未找到指定值！';
    public $errorCode = 10001;
}