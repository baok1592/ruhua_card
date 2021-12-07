<?php


namespace app\lib\exception;


class UpdateException extends BaseException
{
    public $code = 401;
    public $msg = '更新失败，请重试！';
    public $errorCode = 10001;
}