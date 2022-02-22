<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $data = DB::table('invoices')
        ->join('invoice_details','invoices.id','=','invoice_details.invoiceID')
        ->join('products','invoice_details.productID','=','products.id')
        ->groupBy('invoice_details.productID')
        ->where('invoices.status',-1)
        ->select('invoice_details.productID')
        ->addSelect(DB::raw('null as products'))
        ->havingRaw('SUM(invoice_details.quantity) > 10')
        ->get();
        $bestSeller = array();
        foreach($data as $item){
            $item->products= DB::table('products')->where('id',$item->productID)->get();
                foreach ($item->products as $key ) {
                    $bestSeller[] = $key;
                }
        }
       
        $products = DB::table('products')->take(6)->paginate(6);
        return view('user.home.index',compact('products','bestSeller'));
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
