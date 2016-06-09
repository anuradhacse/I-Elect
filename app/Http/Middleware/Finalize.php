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
        if($election->finalize && $request->fullUrlIs('http://localhost/ielect/public/elections/'.$election_id.'/edit')){
            flash()->warning("Cannot Edit this Election.This Election has already finalized");
            return redirect('elections/'.$election_id.'/show');

        }
       else if($election->finalize && $request->fullUrlIs('http://localhost/ielect/public/elections/'.$election_id.'/finalize')){
            flash()->warning("This Election has already finalized");
            return redirect('elections/'.$election_id.'/show');

        }
       else if($election->finalize && $request->fullUrlIs('http://localhost/ielect/public/voters/'.$election_id.'/create')){
           flash()->warning("This Election has already finalized.Cannot add voters");
           return redirect('elections/'.$election_id.'/show');

       }
       else if($election->finalize && $request->fullUrlIs('http://localhost/ielect/public/candidates/'.$election_id.'/create')){
           flash()->warning("This Election has already finalized.Cannot add candidates");
           return redirect('elections/'.$election_id.'/show');

       }
       else if(!$election->finalize && $request->fullUrlIs('http://localhost/ielect/public/elections/'.$election_id.'/vote')){
           flash()->warning("This Election is not finalized yet.Sorry you cant vote!!");
           return redirect('/voterhome');

       }
        return $next($request);

    }
}
