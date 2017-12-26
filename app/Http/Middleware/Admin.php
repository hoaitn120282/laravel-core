<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        // User is guest
        if (\Auth::guard($guard)->guest()) {
            return redirect('/');
        }
        // User is super admin        
        if (\Auth::guard($guard)->user()->is_admin) {                    
            return $next($request);
        }
        
        // Check user has role
        $role = \Auth::guard($guard)->user()->roles;
        if (!empty($role)) {
            if (!$role->status) {
                return redirect('/');
            }
        }        
        // Check user has access
        if ($this->userHasAccessTo($request)) {            
            return $next($request);
        }

        // Request ajax
        if ($request->ajax()) {
            return response()->json(['status' => 403, 'success' => false, 'message' => 'Unauthorised.'], 403);
        }
        return abort(403);
    }


    /*
    |--------------------------------------------------------------------------
    | Additional helper methods for the handle method
    |--------------------------------------------------------------------------
    */
    /**
     * Checks if user has access to this requested route
     *
     * @param  \Illuminate\Http\Request $request
     * @return Boolean true if has permission otherwise false
     */
    protected function userHasAccessTo($request, $guard = 'admin')
    {               
        return $this->hasPermission($request, $guard);
    }

    /**
     * hasPermission Check if user has requested route permimssion
     *
     * @param  \Illuminate\Http\Request $request
     * @return Boolean true if has permission otherwise false
     */
    protected function hasPermission($request, $guard = 'admin')
    {
        $required = $this->requiredPermission($request, $guard);

        return !$this->forbiddenRoute($request) && \Auth::guard($guard)->user()->hasPermission($required);
    }

    /**
     * Extract required permission from requested route
     *
     * @param  \Illuminate\Http\Request $request
     * @return String permission_slug connected to the Route
     */
    protected function requiredPermission($request)
    {
        $action = $request->route()->getAction();
        $required = [];

        if (isset($action['controller'])) {
            $controller = isset($action['namespace']) ? explode("{$action['namespace']}\\", $action['controller']) : [];

            $required = !empty($controller) ? (array)$controller[1] : (array)$action['controller'];
        }

        return $required;
    }

    /**
     * Check if current route is hidden to current user role
     *
     * @param  \Illuminate\Http\Request $request
     * @return Boolean true/false
     */
    protected function forbiddenRoute($request, $guard = 'admin')
    {
        $action = $request->route()->getAction();
            
        if (isset($action['except'])) {            
            return $action['except'] == \Auth::guard($guard)->user()->role->id;
        }

        return false;
    }
}
