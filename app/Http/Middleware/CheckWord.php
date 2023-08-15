<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $CheckWords = ['apple', 'banana'];
        $parameters = $request->all();
        foreach ($parameters as $key => $value) {
            if ($key == 'content') {
                foreach ($CheckWords as $CheckWords) {
                    if (strpos($value, $CheckWords) !== false) {
                        return response('this content has forbiddrn words!!', 400);
                    }
                }
            }
        }
        return $next($request);
    }
}
