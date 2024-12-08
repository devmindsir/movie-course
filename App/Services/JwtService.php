<?php

namespace App\Services;

use Dotenv\Dotenv;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtService
{

  private $key;
  private $exp;

  public function __construct()
  {
    $dotenv = Dotenv::createImmutable(BASE_PATH);
    $dotenv->load();
    $this->key = $_ENV['JWT_KEY'] ?? null;
    $this->exp = time() + 24 * 3600;
  }

  //!ENCODE
  private function encode($payload)
  {
    $payload['iat'] = time();
    $payload['exp'] = $this->exp;
    return JWT::encode($payload, $this->key, 'HS256');
  }

  //!DECODE
  private function decode($jwt)
  {
    return JWT::decode($jwt, new Key($this->key, 'HS256'));
  }

  //!SET COOKIE
  public function createToken($user)
  {
    $payload = [
      'user_email' => $user->email
    ];
    return $this->encode($payload);

//    setcookie('token', $token, $this->exp, '/', '', true, true);
  }

  //!Get From Cookie
  public function validateToken($token)
  {
    if ($token) {
      try {
        $decode = $this->decode($token);
        return $decode->user_email;
      } catch (Exception $e) {
        $this->destroyToken();
      }
    }
  }

  public function destroyToken()
  {
    setcookie('token', '', time() - 3600, '/', '', true, true);
  }
}
