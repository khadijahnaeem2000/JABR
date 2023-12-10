<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Get the currently logged-in user
        $user = $this->customAuthenticationLogic();

        if (!$user) {
            // User is not authenticated, redirect to login
            return redirect('login');
        }

        // Check if the user is an admin, and if so, allow access
        if ($this->isAdmin($user)) {
            return $next($request);
        }

        foreach ($roles as $role) {
            // Check if the user has the required role
            if ($this->hasRole($user, $role)) {
                return $next($request);
            }
        }

        // If the user doesn't have the required role, redirect to login
       return response('Forbidden', 403);
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

    private function isAdmin($user)
    {
        return $user->role_Id === 1;
    }

    private function hasRole($user, $role)
    {
        // Query your database to check if the user has the required role
        $userRole = DB::table('users')
            ->where('id', $user->id)
            ->where('role_Id', $role)
            ->first();

        return $userRole !== null;
    }
}

