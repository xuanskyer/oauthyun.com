<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //返回json格式数据
    public function returnJson($ret = [], $status = 200, $headers = ['Content-Type:application/json', 'charset=utf-8'], $options = 0){
        return response()->json((array)$ret, $status, $headers, $options);
    }
}
