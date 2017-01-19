<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Validations\TestValidator;

class TestController extends Controller
{
    public function show(){
        echo 'show';

    }

    public function getUserInfo($id = 0){


        //验证用户的输入数据，不合法直接返回错误信息并退出
        TestValidator::paramsValidate(array('id' => $id), TestValidator::$rules, TestValidator::$rules_code);

        $ret = array(
            'id'    => $id,
            'name' => 'xxx',
        );
        return $this->returnJson($ret);
    }
}
