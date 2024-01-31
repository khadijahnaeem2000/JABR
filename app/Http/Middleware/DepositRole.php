<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositRole
{
     public function handle($request, Closure $next)
{
    $user = $this->customAuthenticationLogic();
      if (!$user) {
            // User is not authenticated, redirect to login
            return redirect('login');
        }

    if ($user && $user->role_Id === 1) {
        // Admins have access to all pages
        return $next($request);
    } elseif ($user && $user->role_Id === 2) {
        // Agents can access the 'AddTask' and 'Task' routes
        if ($request->routeIs('DepositAmount') || $request->routeIs('DepositHistory')) {
            return $next($request);
        } else {
            return redirect('access');
        }
    } elseif ($user && $user->role_Id  === 3) {
        // Normal users have no access to any page
         return redirect('access');
    }

    return abort(401, 'Unauthorized');
}
     private function customAuthenticationLogic()
    {
        // Implement your custom authentication logic here using your DB queries
        // For example:

        $email = session('Email');

        // Query your database to authenticate the user
        $user = DB::table('users')
            ->where('Email', $email)
            ->first();

        return $user;
    }
}
