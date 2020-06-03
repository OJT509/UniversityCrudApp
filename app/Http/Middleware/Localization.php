<?php

namespace App\Http\Middleware;

use Closure;

class Localization
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
        if (session() -> has('locale')){
            app() -> setLocale(session() -> get('locale'));
        }

        return $next($request);
    }
}

/**Not my code, used multiple sources across the diffrent files e.g.
StackOverflow. (2018). Localization laravel. Retrieved from https://stackoverflow.com/questions/48607759/localization-laravel
Laracasts. (2018). Laravel 5.4 set locale in session. Retrieved from https://laracasts.com/discuss/channels/laravel/laravel-54-set-locale-in-session
Documentation also used
*/