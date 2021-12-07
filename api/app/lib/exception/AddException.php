<?php


namespace app\lib\exception;


class AddException extends BaseException
{
    public $code = 404;
    public $msg = '添加失败，请重试！';
    public $errorCode = 10004;
}