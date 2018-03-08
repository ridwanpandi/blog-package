<?php
namespace Ridwanpandi\Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;

class TokenController extends Controller
{
    private $token;
    private $secretKey;

    /**
    * Constructor
    * @param JWT
    * @return void
    */
    public function __construct(JWT $token)
    {
        // $this->middleware("auth");
        $this->secretKey = base64_encode("s3cr3t");
        $this->token = $token;
    }

    /**
    * Get all data
    *
    * @return JSON
    */
    public function getToken()
    {

        $tokenId    = base64_encode(mcrypt_create_iv(32));
        $issuedAt   = time();
        $notBefore  = $issuedAt + 10;             //Adding 10 seconds
        $expire     = $notBefore + 6000;            // Adding 60 seconds
        $serverName = $_SERVER['HTTP_HOST'];

        $data = [
            'iat'  => $issuedAt,         // Issued at: time when the token was generated
            'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
            'iss'  => $serverName,       // Issuer
            'nbf'  => $notBefore,        // Not before
            'exp'  => $expire,           // Expire
            'data' => [                  // Data related to the signer user
                'username'   => "ridwanpandi", // userid can you get from the users table too
                'password' => "ridwanpandi", // User name
            ]
        ];

        $jwt = JWT::encode($data, $this->secretKey, 'HS256');

        $response = ["token" => $jwt];
        return response()->json($response);
    }

    /**
    * Get Payload Data
    *
    * @return JSON
    */
    public function getPayload(Request $request)
    {
        try {
            $token = $request->header("authorization");
            $ex = explode(" ", $token);
            $jwt = $ex[1];
            $secretKey = $this->secretKey;

            $decoded = JWT::decode($jwt, $secretKey, array('HS256'));

            $response = ["payload" => $decoded];
            return response()->json($response);
        } catch (ExpiredException $e) {
            $response = ["message" => $e->getMessage()];
            return response()->json($response);
        }

    }

}
