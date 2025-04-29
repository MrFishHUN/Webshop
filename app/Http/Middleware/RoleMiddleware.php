<?php

namespace App\Http\Middleware;

use App\Roles;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        if (!$user) {
            abort(403);
        }

        $enumRoles = array_map(fn($role) => Roles::tryFrom($role), $roles);
        $enumRoles = array_filter($enumRoles);

        if (empty($enumRoles)) {
            abort(403);
        }


        $roleValues = array_map(fn(Roles $role) => $role->value, $enumRoles);

        if (!$user->roles()->whereIn('role', $roleValues)->exists()) {
            abort(403);
        }

        return $next($request);
    }
}
