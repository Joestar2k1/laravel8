<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function loginForm(){
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
        ]);
        $checkAuth = Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'));
        if ( $checkAuth) {
            
            DB::table('users')
            ->where('email',$request->email)
            ->update([
                'remember_token' => Session::get('_token')
            ]);
            $user = DB::table('users')
            ->where('remember_token',$request->_token)->get();
            foreach($user as $item){
                Session::put('customers',$item);
                Session::put('carts',[]);
            }
            return redirect()->route('user.home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        Session::flush();
        $request->session()->invalidate();
        return redirect()->route('user.home');
    }
    public function registerForm(){
        return view('user.auth.register');
    }
    public function register(Request $request){
        $checkEmail = DB::table('users')->where('email',$request->email)->exists();
        if($checkEmail){
            Session::put('error-email','Email đã được sử dụng');
            return redirect()->route('user.register');
        }
        if($request->password != $request->passwordConfirm){
            Session::put('error-password','Mật khẩu không trùng khớp');
            return redirect()->route('user.register');
        }
        $randomID = 'KH'.Date('Ymd') . Str::random(3);
        if($request->has('avatar')){
            $file= $request->avatar;
            $ext = $request->avatar->extension();//lấy đuôi file png||jpg
            $file_name ='avatar'.Date('Ymd').'.'.$ext;
            $file->move(public_path('frontend/assets/img/avaters'),$file_name);
            DB::table('users')->insert([
                [
                    'id' => $randomID,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'fullName' => $request->fullName,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'avatar' => $file_name,
                    'status' => 0,
                ],
            ]);
        }
       
        return redirect()->route('user.login');
    }
}
