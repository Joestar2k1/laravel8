<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function loadAccount(){
        $data =DB::table('users')->where('isAdmin',0)->paginate(3);
        return view('admin.accounts.index',compact('data'));
    }
    public function loadAccountAdmin(){
        $data =DB::table('users')->where('isAdmin',1)->paginate(3);
        return view('admin.accounts.index',compact('data'));
    }

    public function deleteAccount($id){
        $users = User::find($id);       
        if($users !=null){       
            $users->delete();  
            return redirect()->route('admin.account');
        }      
    }

    public function Search(Request $request){
        if(isset($_GET['keyWord'])){
            $searchText = $_GET['keyWord'];
            $data = DB::table('users')->where('name','LIKE','%'.$searchText.'%')->paginate(4);
            return view('admin.products.index',compact('data'));
        }else{
            return view('admin.dashboard');
        }
    }

    public function viewProfile(){
       return view('admin.accounts.profile');
    }
}
