<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login() {
        return view('login.index');
    }

    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required|min:6|max:255',
            'password' => 'required|min:6|max:255'
        ]); // back to form if validation fails

        // payload for api call
        $payload = \GuzzleHttp\json_encode([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        // get response
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://investor-api.herokuapp.com/api/1.0/token',
            [
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                'body'    => $payload
            ]
        );

        // parse response body
        $decoded_body = json_decode($response->getBody());
        $accessToken = $decoded_body->accessToken;
        $tokenLifetime = $decoded_body->expires;

        // compute expiration datetime (epoch)
        $expirationTimestamp = time() + $tokenLifetime;

        // store token in session
        session(['accessToken' => $accessToken]);
        session(['expirationTimestamp' => $expirationTimestamp]);

        // redirect to dashboard is successful
        return redirect()->action('DashboardController@index');
    }
}
