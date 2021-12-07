<?php


namespace app\model;


use app\lib\exception\FindException;
use app\service\TokenService;
use think\Model;

class UserPhone extends Model
{
    protected $dateFormat = 'Y-m-d';
    protected $type = [
        'status'    =>  'integer',
        'score'     =>  'float',
        'birthday'  =>  'timestamp',
    ];
}