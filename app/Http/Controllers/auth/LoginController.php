<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except(['dashboard', 'logout']);
    // }

    public function index()
    {
        $test = Test::all();
        return view('auth.login', compact('test'));
    }
    public function register(){
        $test = Test::all();
        return view('auth.register');
    }
    public function store(Request $request){
        // dd($request->all());
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    //   dd($request->all());
        $credemtials = $request->only('email', 'password');
        Auth::attempt($credemtials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('Registration successfull');
    }
    public function authenticate(Request $request){
        $credemtials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(auth()->attempt($credemtials)){
            $request->session()->regenerate();
            return redirect()->route('/dashboard');
        }
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.dashboard');
        }
        return redirect()->route('login')->withError('You are not allowed to access');
    }

    public function logout( Request $request ){
      
    }
}
