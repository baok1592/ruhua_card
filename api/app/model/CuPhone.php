<?php


namespace app\model;


use think\Model;

class CuPhone extends Model
{
    public function coll()
    {
        return $this->belongsTo('Colleague', 'c_id', 'id')->field('id,name,c_phone');
    }

    public function user()
    {
        return $this->belongsTo('User', 'u_id', 'id')->field('id,u_phone');
    }

}