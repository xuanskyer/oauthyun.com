<?php
/**
 * Desc: api错误码信息配置表
 * Created by PhpStorm.
 * User: 张鹏玄 | <zhangpengxuan@yundun.cn>
 * Date: 2015/12/21 17:15
 */

namespace App\Http\Response;

class ResponseCode {
    //错误码列表
    const CODE_UNKNOWN      =   -1;     //未知错误
    const CODE_OK           =   0;      //请求成功
    const CODE_VALIDATED_OK =   1;      //验证通过
    const CODE_TIMEOUT      =   1000;   //
    const CODE_ID_REQUIRE   =   1001;   //
    const CODE_ID_NUMBER    =   1002;   //

    const MSG_UNKNOWN       =  '未知错误';
    const MSG_OK            =  '请求成功';
    const MSG_VALIDATED_OK  =  '验证通过';
    const MSG_TIMEOUT       =  '请求超时';
    const MSG_ID_REQUIRE    =  'ID不能为空';
    const MSG_ID_NUMBER     =  'ID必须为数字';

    //错误码信息列表
    public static $code_msg = [
       self::CODE_UNKNOWN       =>  self::MSG_UNKNOWN,
       self::CODE_OK            =>  self::MSG_OK,
       self::CODE_VALIDATED_OK  =>  self::MSG_VALIDATED_OK,
       self::CODE_TIMEOUT       =>  self::MSG_TIMEOUT,
       self::CODE_ID_REQUIRE    =>  self::MSG_ID_REQUIRE,
       self::CODE_ID_NUMBER     =>  self::MSG_ID_NUMBER,
    ];
}