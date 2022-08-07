<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;

class CustomerValidation
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
        $region = $request->region;
        $validator = Validator::make($request->all(),[
            'dni' => 'required|string|max:45|unique:customers',
            'region' => 'required|integer|exists:regions,id_reg',
            'commune' => [
                'integer',                                                                  
                'required',                                                            
                Rule::exists('communes', 'id_com')                     
                ->where('fk_reg', $region)                                                                   
            ],
            'email' => 'required|string|email|max:120|unique:customers',
            'name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'address' => 'nullable|string|max:255',
            
        ]);

        if($validator->fails()){
            \LogActivity::addToLog($validator->errors());
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        return $next($request);
    }
}
