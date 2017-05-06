<?php
namespace RMS\Auth;
use GuzzleHttp\Client;
/**
 * Authentication service
 *
 * User library for the application
 */
class Service
{

    public static function getAuthInfo($request)
    {
        $client = new Client();
        $header = ['headers' => [
            'Authorization' => $request->header('Authorization'),
            'Accept' => 'application/json'
        ]];
        $user = $client->request('GET', env('API_GATEWAY') . '/auth-info', $header);
        return \GuzzleHttp\json_decode($user->getBody());
    }
    
  

}
