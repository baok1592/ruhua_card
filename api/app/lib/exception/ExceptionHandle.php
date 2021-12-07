<?php


namespace app\lib\exception;

use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Response;
use Throwable;

class ExceptionHandle extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    public function render($request, Throwable $e): Response
    {
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            if(env('APP_DEBUG', '0')){
                return parent::render($request, $e);
            }else{
                $this->code =500;
                $this->msg='服务器错误,请联系客服或者稍后再试';
                $this->errorCode=999;
                $this->recordErrorLog($e);
            }
        }
        $result = [
            'error_code' => $this->errorCode,
            'msg'  => $this->msg,
            'request_url' => request()->url()
        ];

        return json($result, $this->code);
    }
    //记录日志
    public function recordErrorLog(Exception $e){

        Log::record($e->getMessage(),'error');
    }

}