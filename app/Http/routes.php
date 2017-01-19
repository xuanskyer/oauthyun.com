<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get(
    '/', function () use ($app) {
    return $app->welcome();
}
);


$dingo_api = app('Dingo\Api\Routing\Router');

//走oauth2验证的路由列表
$dingo_api->version(
    'v1',
    ['middleware' => 'api.auth'],
    function ($dingo_api) {
        $dingo_api->get(
            'users/test', function () {
            $user = app('Dingo\Api\Auth\Auth')->user();
            return $user;
        }
        );
    }
);

//无需验证的路由列表
$dingo_api->version(
    'v1', [],
    function ($dingo_api) {
        $dingo_api->post(
            'oauth/access_token',
            function () {
                return response()->json(app('oauth2-server.authorizer')->issueAccessToken());
            }
        );
        $dingo_api->get(
            'stats',
            function () {
                return [
                    'stats' => 'dingo api is ok'
                ];
            }
        );
    }
);