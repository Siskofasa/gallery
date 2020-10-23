<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Role\RoleChecker;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     */

    protected $roleChecker;

    public function __construct(RoleChecker $roleChecker){
        $this->roleChecker = $roleChecker;
    }

    public function handle($request, Closure $next, $role){
    /** @var User $user */
        $user = Auth::guard()->user();

        if ( ! $this->roleChecker->check($user, $role)) {
            throw new AuthorizationException('You do not have permission to view this page');
        }

        return $next($request);
    }

}
