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

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->get('/test', [
    'uses' => 'TestController@show'
]);

$app->get('/user/{id}', [
    'uses' => 'TestController@getUserInfo'
]);

$app->get('oauth/access_token/{client_id}/{client_secret}/{grant_type}', [
    'uses' => 'OauthController@access_token'
]);

$app->post('oauth/access_token', [
    'uses' => 'OauthController@access_token'
]);
