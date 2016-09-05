<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use \LucaDegasperi\OAuth2Server\Authorizer;
use League\OAuth2\Server\AuthorizationServer as Issuer;
use League\OAuth2\Server\ResourceServer as Checker;

use App\Oauth2Storage\SessionStorage;
use App\Oauth2Storage\AccessTokenStorage;
use App\Oauth2Storage\ClientStorage;
use App\Oauth2Storage\ScopeStorage;
use \League\OAuth2\Server\Grant\ClientCredentialsGrant;

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\HttpKernel\Exception\HttpException;
class OauthController extends Controller
{
    /**
     * 获取access_token
     * @param Request $request
     * @return Response
     */
    public function access_token(Request $request){
        $capsule = new Capsule();
        $mysql_config = config('database.connections.mysql');
        $capsule->addConnection($mysql_config);
        $capsule->setAsGlobal();
        $issuer = new Issuer();
        $issuer->setRequest($request);
        $sessionStorage     = new SessionStorage();
        $accessTokenStorage = new AccessTokenStorage();
        $clientStorage      = new ClientStorage();
        $scopeStorage       = new ScopeStorage();
        $issuer->setSessionStorage($sessionStorage);
        $issuer->setAccessTokenStorage($accessTokenStorage);
        $issuer->setClientStorage($clientStorage);
        $issuer->setScopeStorage($scopeStorage);
        $clientCredentials = new ClientCredentialsGrant();
        $issuer->addGrantType($clientCredentials);
        try {
            $response = $issuer->issueAccessToken();
            return new Response(
                json_encode($response),
                200,
                [
                    'Content-type'  =>  'application/json',
                    'Cache-Control' =>  'no-store',
                    'Pragma'        =>  'no-store'
                ]
            );

        } catch (HttpException $e) {

            return new Response(
                json_encode([
                    'error'     =>  $e->errorType,
                    'message'   =>  $e->getMessage()
                ]),
                $e->httpStatusCode,
                $e->getHttpHeaders()
            );

        }
    }
}
