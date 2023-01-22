<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Models\VideoRolling\Worker;

class CheckBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken(); 

        if (!$token){
            return 
            \Response::json([
                'status'=>'Failed',
            'message' =>'You not authorised',
            ], 401);
        }

        $user = Worker::where('api_token', $token)->first();
        if (!$user){
            return 
            \Response::json([
            'message' =>'Invalid token',
            ], 403);
        }
        
        return $next($request);
    }
}