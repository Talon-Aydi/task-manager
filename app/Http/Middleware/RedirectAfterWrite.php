<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAfterWrite
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request); 

        if (in_array($request->method(), ['POST', 'PUT', 'DELETE']) && $response->getStatusCode() === 200) {
            return to_route('tasks.task-index');
        }
        return $next($request);
    }
}
