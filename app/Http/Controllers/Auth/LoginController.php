<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/global/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }

    public function login(Request $request){
        $error_login = null;
        if ($request->isMethod('post')) {
            $credentials = $request->only('login', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('global_dashboard');
            }
            else{
                $error_login = 'Данного пользователя не существует!';
                return redirect()->back()->withErrors(['msg', 'Данного пользователя не существует!'])->withInput();
            }
        }

        return view('OLEGYERA.adm.template.adm_index')
            ->with([
                'header' => view('OLEGYERA.adm.layouts.header')->render(),
                'content' => view('OLEGYERA.auth.login')->render(),
                'footer' => view('OLEGYERA.adm.layouts.footer')->render(),
                'is_auth' => true
            ]);
    }
}
