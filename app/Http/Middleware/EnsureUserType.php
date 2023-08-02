<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)   // هان بتعرف البارميترز في طريقة لتعريف عدة متغيرات كبراميتر ...$types هيك بصير يستقبلهم كأريي
    {
        $user =Auth::user();    //عشان نجيب اليوزر الحالي اللي بسجل
        if ($user->type =='user'){
            abort(403,'Unauthorized action.');
            //الابورت يعتبر نوع من انواع الريتيرن
        }
        return $next($request);
    }
}
