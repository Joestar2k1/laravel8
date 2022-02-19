<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
class CartController extends Controller
{
    public function addToCart($id,Request $request){
        // $url = URL::previous();
        $sessionCart = Session::get('carts');
        $count=0;   
        foreach($sessionCart as $item){
                if($item->id == $id){
                    empty($request->quantity)?$item->quantity += 1 : $item->quantity += $request->quantity;
                    $item->subTotal = $item->price*$item->quantity;
                    $count= -1;
                    break;
                }      
            }
        if($count != -1){
                $product =  DB::table('products')
                ->where('id',$id)
                ->select('products.*')
                ->addSelect(DB::raw("0 as quantity,0 as subTotal"))
                ->get();
                empty($request->quantity)?$product[0]->quantity = 1 : $product[0]->quantity = $request->quantity; 
                $product[0]->subTotal = $product[0]->price*$product[0]->quantity;          
                Session::push('carts',$product[0]);
        }
        return redirect()->route('user.home');
    }

    public function deleteCart($id){    
        $cart = Session::get('carts');
        foreach($cart as $index=> $item){
            if($item->id == $id){
               $get_index = $index;    
               break;               
           }
          
        }
        array_splice($cart,$get_index,1);
        Session::forget('carts');
        Session::put('carts',$cart);
        return redirect()->route('user.cart');
    }

    public function showCart(){
        Session::put('carts_total');
       $total = 0;
        foreach(Session::get('carts') as $item){
            $total = $total + $item->subTotal;
        }
        Session::push('carts_total',$total);
     
        return view('user.cart.index');
    }
    public function checkout() {
        $checkCart = Session::get('carts');
        if(empty($checkCart)){
            // $error = true;
            return redirect()->route('user.cart');
        }
     
        return view('user.checkout.index',compact('checkCart'));
    }

}
