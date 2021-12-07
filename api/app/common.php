<?php
// 应用公共文件
//http请求方法
function curl_get($url,$httpcode = 0){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    $file_contents = curl_exec($ch);
    $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;

}

function curl_post($url='',$postdata='',$options=array()){
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    if(!empty($options)){
        curl_setopt_array($ch, $options);
    }
    $data=curl_exec($ch);
    curl_close($ch);
    return $data;


    function succes($id='',$msg = "OK",$code = 200,$httpCode = 200)
    {

        $result = [
            'id' =>$id,
            'code' => $code,
            'msg' => $msg,

        ];

        return json($result, $httpCode);
    }
    function fail($msg = "OK",$code = 400,$httpCode = 200)
    {

        $result = [
            'code' => $code,
            'msg' => $msg,

        ];

        return json($result, $httpCode);
    }
}

