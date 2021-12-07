<?php


namespace app\lib\exception;


class WeChartException extends BaseException
{
    public $code = 400;
    public $msg = '请求服务器出错！';
    public $errorCode = 999;
}