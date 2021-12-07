<?php


namespace app\lib\exception;


class FindException extends BaseException
{
    public $code = 404;
    public $msg = '不存在或未找到，请重试！';
    public $errorCode = 10004;
}