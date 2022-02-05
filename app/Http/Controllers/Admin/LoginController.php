<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout');
    // }

    public function loginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // $this->validate($request, [
        // 'email' => 'required|email',
        // 'password' => 'required|min:6'
        // ]);
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->get('remember'))) {

            $emp_id  = DB::table('employees')
            ->select('id')
            ->where('email',$request->email)
            ->first();

            $empID = $emp_id->id;
            Session::put('empID_session', $empID);

            $emp_type  = DB::table('employees')
            ->select('type')
            ->where('email',$request->email)
            ->first();

             $empType = $emp_type->type;
             Session::put('empType_session', $empType);

             $emp_fullName  = DB::table('employees')
            ->select('fullName')
            ->where('email',$request->email)
            ->first();

             $empFullName = $emp_fullName->fullName;
             Session::put('empFullName_session', $empFullName);

             $emp_Avatar = DB::table('employees')
             ->select('avatar')
             ->where('email',$request->email)
             ->first();

             $empAvatar = $emp_Avatar->avatar;
             Session::put('empAvatar_session', $empAvatar);
             dd($empAvatar);

            $user = DB::table('employees')->where('email',$request->email)->get();
             foreach($user as $item){
                    Session::put('user',$item);
             }

            return redirect()->route('admin.dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login.get');
    }
}
