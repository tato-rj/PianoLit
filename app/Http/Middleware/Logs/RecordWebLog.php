<?php

namespace App\Http\Middleware\Logs;

use Closure;
use App\User;
use App\Log\Loggers\WebLog;
use App\Tools\Traffic;

class RecordWebLog
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
        if ($this->shouldContinue())
            (new WebLog)->push();
    
        return $next($request);
    }

    public function shouldContinue()
    {
        $isNotAdmin = ! auth()->guard('admin')->check();
        $isUser = auth()->guard('web')->check() && (new Traffic)->isRealUser(auth()->user()->id);

        return $isNotAdmin && $isUser;
    }
}