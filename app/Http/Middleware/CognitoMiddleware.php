<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class CognitoMiddleware
 *
 * @package App\Http\Middleware
 */
class CognitoMiddleware
{
    
    /**
     * Cognito Authorizationヘッダのハンドラ
     *
     * @param  Request $request リクエスト
     * @param  Closure $next 次の処理
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // access_tokenの存在検証
        $token = $request->header('Authorization');
        if (!$token) {
            abort(401, 'invalid access');
        }
        // 「ヘッダー . ペイロード . 署名」の構成
        $tokenArray = explode('.', $token);
        if (count($tokenArray) !== 3) {
            abort(401, 'invalid access');
        }
        $decodedPayload = base64_decode($tokenArray[1]);
        $sub = json_decode($decodedPayload, true)["sub"];
        if (!$sub) {
            abort(401, 'invalid access');
        }
        $request->merge(['sub' => $sub]);
        return $next($request);
    }
}
