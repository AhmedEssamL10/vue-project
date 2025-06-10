<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the locale from the URL
        $locale = $request->segment(1);

        // Set the application locale
        if (in_array($locale, ['de', 'ar'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            App::setLocale('de');
        }

        return $next($request);
    }
}
