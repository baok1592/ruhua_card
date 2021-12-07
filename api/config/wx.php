<?php
return [
    'app_id' => 'wx40342b8063b72fc1',
    'app_secret' =>  'bc8719518f6c5e792286832c2e47671b',
    'login_url' =>"https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",

    // 微信获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
        "grant_type=client_credential&appid=%s&secret=%s",
];