<?php


namespace app\model;


use think\Model;

class baseModel extends Model
{
    protected $hidden = ['delete_time'];
}