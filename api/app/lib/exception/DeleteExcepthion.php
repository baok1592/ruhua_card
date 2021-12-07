<?php


namespace app\lib\exception;


class DeleteExcepthion extends BaseException
{
    public $code = 405;
    public $msg = '删除失败，请重试！';
    public $errorCode = 10005;
}