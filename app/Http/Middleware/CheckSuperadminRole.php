<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuperadminRole
{
    public function handle(Request $request, Closure $next)
    {

    
        if ($request->user()->role !== 'superadmin') {
            return redirect()->route('login')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
