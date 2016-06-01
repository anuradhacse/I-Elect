<?php

namespace App\Http\Middleware;

use App\Election;
use Closure;

class Finalize
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
        $election_id=$request->id;
        $election=Election::findOrFail($election_id);
        if($election->finalize){
            flash()->warning("Cannot Edit this Election.This Election has already finalized");
            return redirect('elections/'.$election_id.'/show');

        }
        return $next($request);

    }
}
