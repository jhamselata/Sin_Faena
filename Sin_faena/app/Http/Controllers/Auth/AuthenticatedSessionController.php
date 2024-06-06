<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Traits\HasRoles;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    // Redirigir según el rol del usuario
    $user = Auth::user();
    if ($user->hasRole('admin')) {
        return redirect()->route('dashboard'); // Ruta para admin
    } elseif ($user->hasRole('empleado')) {
        return redirect()->route('dashboardEmpleado'); // Ruta para empleado
    } elseif ($user->hasRole('supervisor')) {
        return redirect()->route('dashboardSupervisor'); // Ruta para supervisor
    }

    return redirect()->route('inicio'); // Ruta para cliente
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

