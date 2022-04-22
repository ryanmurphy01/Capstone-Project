<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AccountType;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $userId = session("LoggedUser");
        $userType = AccountType::where('account_id', '=', $userId)->first();

        if(session()->has('LoggedUser') && $userType->type_id == 2){
            return redirect('/welcome');
        }

        return $next($request);
    }
}
