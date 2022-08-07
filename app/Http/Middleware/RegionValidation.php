<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;

class RegionValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(),[
            'description' => 'required|string|max:90'
        ]);

        if($validator->fails()){
            \LogActivity::addToLog($validator->errors());
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        
        return $next($request);
    }
}
