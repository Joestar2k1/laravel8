<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $countInv = Invoice::All()->count();
        $countUser = DB::table('users');
        // ->where('type','LIKE','%NV%')->count();

        return view('admin.dashboard');
    }

}