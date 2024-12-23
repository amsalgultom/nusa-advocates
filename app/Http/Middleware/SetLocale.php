<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Get the language segment from the URL
    $lang = request()->segment(1);

    // If no language segment is present, redirect to the default language
    if (!$lang) {
        // Set the default language (you may modify this part)
        $defaultLang = config('app.locale');

        // Redirect to the language-specific URL
        return redirect("/$defaultLang");
    }

    if(!in_array($lang, ['en', 'id'])) {
        abort(404);
    }

    // Set the application locale and store it in the session
    app()->setLocale($lang);
    session(['locale' => $lang]);

    return $next($request);
}
}
