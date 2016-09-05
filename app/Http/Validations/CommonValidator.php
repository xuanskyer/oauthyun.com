<?php
/**
 * Desc: 参数验证公共类
 * Created by PhpStorm.
 * User: 张鹏玄 | <zhangpengxuan@yundun.cn>
 * Date: 2015/12/21 15:27
 */

namespace App\Http\Validations;

use Illuminate\Support\Facades\Validator;
use App\Http\Response\ResponseCode;
use Symfony\Component\HttpFoundation\Response;

class CommonValidator extends Validator {

    /**
     * 验证参数是否合法，不合法直接返回错误信息并退出
     * @param array $input
     * @param array $rules          验证规则
     * @param array $rules_code     规则对应错误码
     * @return array
     */
    public static function paramsValidate($input = [], $rules = [], $rules_code = []){
        $validate = self::make($input, $rules, $rules_code);
        if($validate->fails()){
            $errcode = $validate->errors()->first();
            $errmsg = ResponseCode::$code_msg[$errcode];
            $current_time = date('Y-m-d H:i:s', time());
            $ret = [
                'errcode'       => $errcode,
                'errmsg'        => $errmsg,
                'current_time'  => $current_time
            ];
            $jsonObj =  response()->json((array)$ret, 200, [], 0);
            exit($jsonObj->getContent());
        }
    }

}