<?php

namespace App\Http\Middlewares;

class AccessLogMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        $route = $request->getAttribute('route');
        $this->container->logger->info(
            'Request: ' . $request->getMethod() . ' ' . $route->getPattern(),
            $request->getHeaders()
        );
        $response = $next($request, $response);
        $this->container->logger->info(
            'Response: ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase(),
            $response->getHeaders()
        );

        return $response;
    }

}