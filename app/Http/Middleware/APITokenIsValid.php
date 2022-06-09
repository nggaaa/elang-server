<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class APITokenIsValid {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if (!$request->has('api_token')) {
            return response()->json(["status" => "error", "message" => "Unauthorized"]);
        }
        $searchtoken = User::where('api_token', $request->api_token)->first();
        if (!$searchtoken) {
            return response()->json(["status" => "error", "message" => "Unauthorized"]);
        }
        $request->merge(["eng_score" => $searchtoken->eng_score]);
        $request->merge(["arab_score" => $searchtoken->arab_score]);
        return $next($request);
    }
}