<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
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
}
