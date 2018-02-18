<?php

namespace Ridwanpandi\Blog\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $token = $request->header("authorization");

            if (empty($token)) {
                $response = ["message" => "Send your token!"];
                return response()->json($response);
            }
            
            $ex = explode(" ", $token);
            $jwt = $ex[1];
            $secretKey = base64_encode("s3cr3t");

            $decoded = JWT::decode($jwt, $secretKey, array('HS256'));

            return $next($request);
        } catch (ExpiredException $e) {
            $response = ["message" => $e->getMessage()];
            return response()->json($response);
        }
    }
}
