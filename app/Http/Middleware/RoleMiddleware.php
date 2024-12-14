<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    // app/Http/Middleware/RoleMiddleware.php
public function handle(Request $request, Closure $next, $role)
{
    if (Auth::check()) {
        $user = Auth::user();

        if ($role == 'admin' && $user->isAdmin == 1) {
            return $next($request);  // Akses diberikan jika admin
        }

        if ($role == 'user' && $user->isAdmin == 0) {
            return $next($request);  // Akses diberikan jika user biasa
        }
    }

    return redirect('/login')->withErrors(['accessDenied' => 'Akses ditolak']);
}
}
?>