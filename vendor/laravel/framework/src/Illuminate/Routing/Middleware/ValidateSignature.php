<?php

namespace Illuminate\Routing\Middleware;

use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

class ValidateSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
<<<<<<< HEAD
=======
     * @param  string|null  $relative
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Routing\Exceptions\InvalidSignatureException
     */
<<<<<<< HEAD
    public function handle($request, Closure $next)
    {
        if ($request->hasValidSignature()) {
=======
    public function handle($request, Closure $next, $relative = null)
    {
        if ($request->hasValidSignature($relative !== 'relative')) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            return $next($request);
        }

        throw new InvalidSignatureException;
    }
}
