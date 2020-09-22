<?php

namespace Illuminate\Session\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class AuthenticateSession
{
    /**
     * The authentication factory implementation.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->hasSession() || ! $request->user()) {
            return $next($request);
        }

<<<<<<< HEAD
        if ($this->auth->viaRemember()) {
=======
        if ($this->guard()->viaRemember()) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $passwordHash = explode('|', $request->cookies->get($this->auth->getRecallerName()))[2] ?? null;

            if (! $passwordHash || $passwordHash != $request->user()->getAuthPassword()) {
                $this->logout($request);
            }
        }

<<<<<<< HEAD
        if (! $request->session()->has('password_hash')) {
            $this->storePasswordHashInSession($request);
        }

        if ($request->session()->get('password_hash') !== $request->user()->getAuthPassword()) {
=======
        if (! $request->session()->has('password_hash_'.$this->auth->getDefaultDriver())) {
            $this->storePasswordHashInSession($request);
        }

        if ($request->session()->get('password_hash_'.$this->auth->getDefaultDriver()) !== $request->user()->getAuthPassword()) {
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $this->logout($request);
        }

        return tap($next($request), function () use ($request) {
<<<<<<< HEAD
            $this->storePasswordHashInSession($request);
=======
            if (! is_null($this->guard()->user())) {
                $this->storePasswordHashInSession($request);
            }
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        });
    }

    /**
     * Store the user's current password hash in the session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function storePasswordHashInSession($request)
    {
        if (! $request->user()) {
            return;
        }

        $request->session()->put([
<<<<<<< HEAD
            'password_hash' => $request->user()->getAuthPassword(),
=======
            'password_hash_'.$this->auth->getDefaultDriver() => $request->user()->getAuthPassword(),
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function logout($request)
    {
<<<<<<< HEAD
        $this->auth->logoutCurrentDevice();

        $request->session()->flush();

        throw new AuthenticationException;
=======
        $this->guard()->logoutCurrentDevice();

        $request->session()->flush();

        throw new AuthenticationException('Unauthenticated.', [$this->auth->getDefaultDriver()]);
    }

    /**
     * Get the guard instance that should be used by the middleware.
     *
     * @return \Illuminate\Contracts\Auth\Factory|\Illuminate\Contracts\Auth\Guard
     */
    protected function guard()
    {
        return $this->auth;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
