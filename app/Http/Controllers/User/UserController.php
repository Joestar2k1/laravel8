<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function orderManagement(){
        $carts = Session::get('carts');
        $countCart=0;
        if(empty($carts)){
        }else{
            foreach($carts as $item){
                $countCart++;
            }
        }
        // $monthNow = Date('m');
        // $dateNow = Date('d');
        // $countInvoice = DB::table('invoices')
        // ->where('userID',Session::get('customers')->id)
        // ->whereBetween('status',[0,2])
        // ->whereMonth('dateCreated','=' ,1)
        // ->whereDate('dateCreated','<' , $dateNow)
        // ->count();
        // ->get();
        // dd($countInvoice);
         $getInvoice = DB::table('invoices')
        ->where('userID',Session::get('customers')->id)
        ->whereBetween('status',[0,2])
        ->orderBy('dateCreated','desc')
        ->select('invoices.*')
        ->addSelect(DB::raw("null as products"))->get();
        foreach($getInvoice as $item){
            $item->products = DB::table('invoice_details')
            ->join('products','invoice_details.productID','products.id')
            ->where('invoice_details.invoiceID',$item->id)
            ->select('products.*','invoice_details.quantity')->get();
        } 
        return view('user.profile.order_manage',[
            'count' =>$countCart,
            'invoices'=>$getInvoice,
        ]);
    }


    public function accountManagement(){
        return view('user.profile.account_manage');
    }
    public function editUser(Request $request){
        if($request->has('avatar')){
            $file= $request->avatar;
            $ext = $request->avatar->extension();//lấy đuôi file png||jpg
            $file_name ='avatar'.Date('Ymd').'.'.$ext;
            $file->move(public_path('frontend/assets/img/avaters'),$file_name);
            DB::table('users')
            ->where('id',Session::get('customers')->id)
            ->update(
                [
                    'fullName' => $request->fullName,
                    'phone' =>$request->phone,
                    'username'=> $request->username,
                    'address' =>$request->address,
                    'avatar' =>$file_name,
                ]
            );
        }else{
            DB::table('users')
            ->where('id',Session::get('customers')->id)
            ->update(
                [
                    'fullName' => $request->fullName,
                    'phone' =>$request->phone,
                    'username'=> $request->username,
                    'address' =>$request->address,
                ]
            );
        }
        Session::forget('customers');
        $newUser = DB::table('users')->where('remember_token',$request->_token)->get();
        Session::put('customers',$newUser[0]);
      
        return redirect()->route('user.account_management');
    }
}
