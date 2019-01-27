<?php

namespace App\Http\Middlewares;

class AuthorizationMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        $secret = explode(',', env('SECRET_TOKEN'));

        $header_raw = $request->getHeader('Authorization');

        $header_data = "";
        foreach ($header_raw as $header) {
            $header_data = $header;
        }

        if (!in_array($header_data, $secret))
        {
            return $response->withJson(array(
                'code'     => 401,
                'status'  => 'Unauthorized',
                'message' => 'Access token require',
            ), 401);
        }

        return $next($request, $response);
    }

}