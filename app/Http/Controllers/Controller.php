<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    /**
     * Verificar si el usuario está autenticado
     * 
     * @return \Illuminate\Http\RedirectResponse|null
     */
    protected function checkAuth()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return null;
    }
}
