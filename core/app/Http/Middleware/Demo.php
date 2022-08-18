<?php

namespace App\Http\Middleware;

use App\GeneralSettings;
use Closure;
use Illuminate\Support\Facades\Session;

class Demo
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
        $gnl = GeneralSettings::first();
        if ($request->isMethod('POST') || $request->isMethod('PUT') || $request->isMethod('DELETE')){

            $notification =  array('alert' => 'This is Demo version.  You can not change any thing','alert-type' => 'warning');
            return redirect()->back()->with($notification);

        }
        return $next($request);
    }
}
