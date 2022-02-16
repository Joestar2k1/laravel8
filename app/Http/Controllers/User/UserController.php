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
    public function editUser(){
        return redirect()->route('user.account_management');
    }
}
