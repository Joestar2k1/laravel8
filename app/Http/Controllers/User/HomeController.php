<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $products = DB::table('products')->paginate(3);
        return view('user.home.index',compact('products'));
    }
    public function shop(){
        $products = DB::table('products')->paginate(6);
        return view('user.home.shop',compact('products'));
    }
    public function Search(Request $request){
        if(isset($_GET['keyWord'])){
            $searchText = $_GET['keyWord'];
            $data = DB::table('products')->where('name','LIKE','%'.$searchText.'%')->get();
            return view('admin.products.index',compact('data'));
        }else{
            return view('admin.dashboard');
        }
    }
}
