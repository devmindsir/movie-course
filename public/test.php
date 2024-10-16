<?php

//!HEADER
$header = ['typ' => 'JWT', 'alg' => 'HS256'];
//!HEADER JSON
$header_json = json_encode($header);
//!HEADER ENCODE ---- > BASE 64
//!PHP  ('+',/,=) = JWT (-,_,'')
$header_encode = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header_json));

//!PAYLOAD
$payload = ['sub' => '1234567890', 'name' => 'farhad', 'user_id' => 22];
//!PAYLOAD JSON
$payload_json = json_encode($payload);
//!PAYLOAD ENCODE
$payload_encode = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload_json));

$data = $header_encode . '.' . $payload_encode;
$key = 'ASRTGGEE6453&%%#%@@4545HT=';

//!SIGNATURE
$signature = hash_hmac('sha256', $data, $key, true);

//!SIGNATURE Encode
$signature_encode = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

//!TOKEN
$token = $header_encode . '.' . $payload_encode . '.' . $signature_encode;

echo $token;
