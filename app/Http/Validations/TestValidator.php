<?php
/**
 * Desc: 功能描述
 * Created by PhpStorm.
 * User: 张鹏玄 | <zhangpengxuan@yundun.cn>
 * Date: 2015/12/21 15:27
 */

namespace App\Http\Validations;
use App\Http\Response\ResponseCode;

class TestValidator extends CommonValidator {

    //验证规则
    public static $rules = [
        'id' => 'required|numeric',
    ];

    //验证错误码
    public static $rules_code = [
        'id.required' => ResponseCode::CODE_ID_REQUIRE,
        'id.numeric' =>  ResponseCode::CODE_ID_NUMBER,
    ];

}