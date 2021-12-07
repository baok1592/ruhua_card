<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('', function () {
    echo '名片管理系统' . VAE_VERSION . '(开源版)';
});
Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});
Route::get('hello/:name', 'index/hello');

/**
 * 系统安装
 */
Route::group('install', function () {
    Route::get('', 'install.Index/step1');
    Route::get('step2', 'install.Index/step2');
    Route::get('step3', 'install.Index/step3');
    Route::post('create_data', 'install.Index/createData');
});

//文章
Route::group('',function (){
    Route::get('get_art','user.Article/getArticleContentByID');//查询文章详情
    Route::get('get_all_article','user.Article/getAllArticle');//查询所有文章
    Route::group('article',function (){
        Route::post('add_article','cms.ArticleManage/addArticle');//添加文章
        Route::delete('del_article','cms.ArticleManage/deleteArticle');//删除文章
        Route::post('edit_article','cms.ArticleManage/updataArticle');//修改文章
    })->middleware('CheckCms');
});

//广告
Route::group('',function (){
    Route::get('get_all_banner','user.Banner/getAllBanner');//查询所有广告
    Route::get('get_a_banner','user.Banner/getBanner');//查询单个
    Route::group('banner',function (){
        Route::post('add_banner','cms.BannerManage/addBanner');//添加广告
        Route::delete('del_banner','cms.BannerManage/deleteBanner');//删除广告
        Route::post('updata_banner','cms.BannerManage/updataBanner');//更新/修改广告
    })->middleware('CheckCms');
});

//配置
Route::group('',function (){
    Route::get('get_all_systeam','user.Systeam/getAllSysteam');//查询所有配置信息
    Route::get('get_all_systeam2','user.Systeam/getAllSysteam2');//查询所有配置信息
    Route::any('get_ue','cms.ue/get');//查询所有配置信息
    Route::group('systeam',function (){
        Route::delete('del_systeam','cms.SysteamManage/deleteSysteam');//删除配置
        Route::post('edit_systeam','cms.SysteamManage/updateSysteam');//修改配置信息
    })->middleware('CheckCms');
});

//用户
Route::group('',function (){
    Route::get('get_all_user','user.User/gteAllUser');//查询所有用户信息
    Route::post('get_token', 'cms.TokenController/get_token');//生成用户Token
    Route::get('user_info', 'user.GetUserID/user_info');//token获取用户id
    Route::post('edit_user', 'cms.UpdateUser/UpdateOrCreateUser')->middleware('CheckCms');//修改用户信息
    Route::post('getWxMobile','cms.UserManage/getWxMobile');//手机号授权
    Route::post('user_info','cms.UserManage/user_info');//
});

//职员
Route::group('',function (){
    Route::get('get_all_colleague','user.Colleague/get_all_colleague');//查找所有职员
        Route::get('get_colleague','user.Colleague/getColleague');//id查找职员
    Route::get('get_other_colleague','user.Colleague/getOtherColleague');//查询所有同事
    Route::get('get_f_colleague','user.Colleague/gett1');//查询所有同事
    Route::group('colleague',function (){
        Route::post('add_colleague','cms.ColleagueManage/addColleague');//添加职员
        Route::delete('del_colleague','cms.ColleagueManage/deleteColleague');//删除职员
        Route::post('edit_colleague','cms.ColleagueManage/updateColleague');//修改职员信息

    })->middleware('CheckCms');
    Route::post('edit_coll','user.Colleague/edcoll');//职员修改自己的信息
    Route::get('get_mine','user.Colleague/getcoll');//职员获取自己的信息
});

//管理员

Route::group('admin', function () {
    Route::get('getaid', 'cms.Admin/getaid'); //登录
    Route::post('login', 'cms.Admin/login'); //登录
    Route::get('get_admin', 'cms.Admin/get'); //获取管理员
    Route::group('',function (){
        Route::post('editpwd', 'cms.Admin/editPSW'); //修改密码
        Route::post('add_admin', 'cms.Admin/add'); //新增管理员
        Route::post('del_admin', 'cms.Admin/del'); //删除
        Route::post('ed_pwd', 'cms.Admin/ed_pwd'); //修改密码
        Route::get('check', 'cms.Admin/check'); //登录检测
    })->middleware('CheckCms');

});
//统计
Route::group('',function (){
    Route::get('statistics_count','common.TjLoginManage/statistics_count');//统计访客页面数量
    Route::get('add_login','common.TjLoginManage/add_login');//新增访客记录
});
//访问人数记录
Route::group('',function (){
    Route::get('get_all_userphone','common.UserPhoneManage/get_all_userphone');//获取"联系我"所有用户手机
});
//上传图片
Route::group('',function (){
    Route::post('upload_img','common.ColleagueScImg/uploadImg');
});

//联系我相关
Route::group('',function (){
    Route::get('get_my_user','cms.CUPhone/get_one');
        Route::post('ed_state','cms.CUPhone/edit');
    Route::group('cms',function (){
        Route::get('get_phone','cms.CUPhone/get');
    })->middleware('CheckCms');
});

//微信授权获取token
Route::group('auth', function () {
    Route::get('js_sdk', 'auth.Gzh/jsConfig');  //微信分享时sdk需要的参数
    Route::get('wxcode_url', 'auth.Auth/wxcodeUrl');   //请求公众号code
    Route::get('gzh_token', 'auth.Auth/getToken');   //异步接收公众号code,获取openid，返回token
    Route::post('token_verify', 'auth.Auth/verifyToken');   //验证用户token

    Route::post('get_xcx_token', 'auth.Auth/getXcxToken');   //小程序获取用户token
    Route::get('update_user_ma', 'auth.Auth/updateUserMa');   //修改邀请码

    Route::get('gzh_token', 'auth.Auth/getToken');   //异步接收公众号code,获取openid，返回token
    Route::post('upinfo', 'auth.Auth/xcx_upinfo');   //更新用户昵称、头像
    Route::post('app_wx_login', 'auth.Auth/app_wx_login');   //app微信登陆
    Route::post('get_app_token', 'auth.Auth/getAppToken');   //app获取用户token

    Route::post('get_login_code', 'auth.Mobile/getLoginCode');   //获取手机登录的验证码
    Route::post('get_mobile_token', 'auth.Mobile/getMobileToken');   //获取手机登录的token

    Route::post('get_code', 'user.UserMobile/getMobileCode');   //获取手机绑定的验证码
    Route::post('bind_mobile', 'user.UserMobile/addMobileBind');   //绑定用户

    Route::post('bind_wx_mobile', 'user.UserMobile/getWxMobile');   //获取微信的手机号并绑定
    Route::post('gzh_bind_code', 'user.User/gzh_bind_code');   //公众号手机获取验证码
    Route::get('gzh_bind_mobile', 'user.User/bind_mobile');   //公众号手机绑定
    // Route::get('test_get_access_tooken', 'auth.Auth/access_token');   //测试获取access_)token自行删除
    Route::get('checkSignature', 'auth.Auth/checkSignature');   //消息推送


    Route::post('user_register', 'user.User/register');   //用户注册
    Route::post('user_mobile', 'user.User/mobileAdduser');   //用户注册电话号码
    Route::get('get_is_state', 'user.User/get_is_state');   //获取用户审核状态
    Route::post('mobile_login_code', 'auth.Mobile/mobile_login_code');   //手机号码注册登录
});


