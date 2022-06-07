<?php

namespace App\Http\Middleware;

use App\Place;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserOnEdit
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
        dd('middleware', $request);
        //Controllo che nessuno user non puoi modificare i dati dei altri!
        $user_id = Auth::user()->id;
        // if ($user_id != $place->user_id) {
        //     return redirect()->route('host.places.index', ['message' => 'Unauthorised access']); //TODO da vedere il messaggio di errore
        // }
        
        return $next($request);
    }
}
