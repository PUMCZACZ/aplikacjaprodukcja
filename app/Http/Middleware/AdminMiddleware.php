<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        /** @var User $user */
        $user = Auth::user();
        if ($user->cannot('admin')) {
            throw new AuthorizationException('spadaj');
        }

        return $next($request);
    }
}
