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

  public function FormCreateBlog(){
        return view ('admin.blogs.create');
  }
  public function CreateBlog(Request $request){
    $countPrd = DB::table('blogs')->count()+1;
    $file_name='';
    if($request->has('image')){
        $file= $request->image;
        $ext = $request->image->extension();//lấy đuôi file png||jpg
        $file_name = Date('Ymd').'-'.'blog'.$countPrd.'.'.$ext;
        $file->move(public_path('backend/assets/img/latest-news'),$file_name);
    }
    DB::table('blogs')->insert([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $file_name,
        'postDated' => Date('Y-m-d'),
        'employeeID' => Session::get('emp')->id,
        'status' => 1,
    ]);
    $blogs = DB::table('blogs')
    ->join('employees','blogs.employeeID','employees.id')
    ->select('blogs.*')
    ->orderBy('postDated','desc')
    ->paginate(6);
   
    return view('admin.blogs.index',compact('blogs'));
  }
  public function DeleteBlog($id){
    $blogs = DB::table('blogs')
    ->where('id',$id)
    ->delete();
    $blogs = DB::table('blogs')
    ->join('employees','blogs.employeeID','employees.id')
    ->select('blogs.*')
    ->orderBy('postDated','desc')
    ->paginate(6);
   
    return view('admin.blogs.index',compact('blogs'));
  }
}
