<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class AccountController extends Controller
{
    protected function Index()
    {
        $data = DB::table('users')->where('isAdmin', 1)->get();
        return view('admin.accounts.index', compact('data'));
    }

    public function loadAccount()
    {
        $data = DB::table('users')->where('isAdmin', 0)->get();
        return view('admin.accounts.index', compact('data'));
    }

    public function loadAccountAdmin()
    {
        $data = DB::table('users')->where('isAdmin', 1)->get();
        return view('admin.accounts.index', compact('data'));
    }

    public function create()
    {
        return View('admin.accounts.create');
    }

    public function store(Request $request)
    {
        // Kiểm tra xem dữ liệu từ client gửi lên bao gốm những gì
        //dd($request);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        $data['password'] = Hash::make($request->password);

        // Tạo mới user với các dữ liệu tương ứng với dữ liệu được gán trong $data
        User::create($data);
        echo "success create user";

        return redirect()->route('accountCreate.create')->with('msg', 'Create account successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View('admin.accounts.create');
    }
}