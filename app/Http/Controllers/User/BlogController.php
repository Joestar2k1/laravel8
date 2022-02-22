<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs')
        ->join('employees','blogs.employeeID','employees.id')
        ->select('blogs.*','employees.type')
        ->orderBy('postDated','desc')
        ->where('blogs.status',1)
        ->take(6)->get();
       
        return view('user.blogs.index',compact('blogs'));
    }
    public function viewDetails($id){
        $getBlog = DB::table('blogs')
        ->join('employees','blogs.employeeID','employees.id')
        ->select('blogs.*','employees.type')
        ->where('blogs.id',$id)
        ->get();
        $blog = $getBlog[0];
    
        return view('user.blogs.single-blogs',compact('blog'));
    }
}
