<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function addToCart($id,$quantity=1){
        
        $sessionCart = Session::get('carts');
        $get_length=count($sessionCart);
        $count=0;
        if($sessionCart == null){
            $product =  DB::table('products')
            ->where('id',$id)
            ->select('products.*')
            ->addSelect(DB::raw("1 as quantity,0 as subTotal"))
            ->get();
            foreach($product as $item){
                $item->subTotal = $item->price*$item->quantity; 
              }
            Session::push('carts',$product[0]);
        }else{
            foreach($sessionCart as $item){
                if($item->id == $id){
                    $count=-1;
                }
                $count++;
            }
            if($count == $get_length){
                $product =  DB::table('products')
                ->where('id',$id)
                ->select('products.*')
                ->addSelect(DB::raw("1 as quantity,0 as subTotal"))
                ->get();
                foreach($product as $item){
                  $item->subTotal = $item->price*$item->quantity; 
                }
                Session::push('carts',$product[0]);
            }else{
                foreach($sessionCart as $item){
                    if($item->id == $id){
                        $item->quantity = $item->quantity+ $quantity;
                        $item->subTotal = $item->price*$item->quantity;
                        break;
                    }
                }
            }
        }
        // dd(Session::get('carts'));
        return redirect()->route('user.home');
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
