<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs')
        ->join('employees','blogs.employeeID','employees.id')
        ->select('blogs.*')
        ->orderBy('postDated','desc')
        ->paginate(6);
       
        return view('admin.blogs.index',compact('blogs'));
    }
    public function LockBlog($id){
        DB::table('blogs')
       ->where('id',$id)
       ->update([
           'status' => -1,
       ]);
       return redirect()->route('admin.blogs.index');
   }
   public function unLockBlog($id){
       DB::table('blogs')
      ->where('id',$id)
      ->update([
          'status' => 1,
      ]);
      return redirect()->route('admin.blogs.index');
  }
}
