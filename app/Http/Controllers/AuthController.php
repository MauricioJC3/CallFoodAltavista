<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests\ResetPassword;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'remember_token' => Str::random(50),
        ]);

        Auth::login($user);

        return redirect($this->redirectTo($user));
    }




    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Comprobar si el usuario está activo
        if (Auth::user()->is_active) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo(Auth::user()));
        } else {
            Auth::logout(); //  Cerrar la sesión del usuario si no está activo
            return back()->withErrors([
                'email' => 'Your account is inactive. Please contact support.',
            ]);
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}




    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }




    protected function redirectTo($user)
    {
        switch ($user->role) {
            case 'superadmin':
                return '/superadmin';
            case 'admin':
                return '/admin';
            default:
                return '/home';
        }
    }



    /* ////////////////////////////*/
        // Recuperar contraseña
    /* //////////////////////////// */


    public function forgot()
{
    return view('auth.forgot');
}

public function forgot_post(Request $request)
{
    $user = User::where('email', $request->email)->first();
    if ($user) {
        //$user->remember_token = Str::random(60);
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordMail($user));

        return redirect()->back()->with('success', 'Revise su correo electrónico para restablecer la contraseña');
    } else {
        return redirect()->back()->with('error', 'El correo utilizado no está registrado en el sistema');
    }
}

public function getReset($token)
{
    $user = User::where('remember_token', $token)->first();
    if (!$user) {
        abort(403);
    }

    return view('auth.reset', ['token' => $token]);
}

public function postReset($token, ResetPassword $request)
    {
        $user = User::where('remember_token', '=', $token);

        if ($user->count() == 0) {
            abort(403);
        }
        $user = $user->first();

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('login')->with('success', 'Contraseña restablecida');
    }
}
