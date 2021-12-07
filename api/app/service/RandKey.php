<?php


namespace app\service;


class RandKey
{
    //随机字符串
    function get_rand_str($len)
    {
        $str = "1234567890asdfghjklqwertyuiopzxcvbnmASDFGHJKLZXCVBNMPOIUYTREWQ";
        return substr(str_shuffle($str), 0, $len);
    }
}