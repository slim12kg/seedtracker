<?php

namespace App\Http\Middleware;

use Closure;

class ActivateAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->is_admin){
            if(!$request->user()->activationToken->verified){
                auth()->logout();

                return redirect()->route('login')
                    ->with('error','Kindly check your email for the link to activate your account');
            }
        }

        return $next($request);
    }
}
