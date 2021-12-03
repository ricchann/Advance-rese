<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function getRegister()
    {
        return view('register');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();
        return redirect()->route('thanks');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

                if  (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    
                    return redirect('mypage')->with('login_success', 'ログイン成功しました！');
                }
                return back()->withErrors([
                    'login_error' => 'メールアドレスかパスワードが間違っています。',
                ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('logout', 'ログアウトしました！');
    }
}
