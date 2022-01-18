<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function loadProduct(){
        $data =DB::table('products')->paginate(4);
        return view('admin.products.index',compact('data'));
    }
    public function viewCreate(){
        $data =DB::table('products')->select('type')->distinct()->get();
        return view('admin.products.create',compact('data'));
    }
    public function createProduct(Request $request){
        $countPrd = Product::all()->count();
        $date = Date('Y m d');
        $randomID = 'f'.$date .'pr' . $countPrd;
        $products = new Product;
        
        $products->id = $randomID;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->stock = $request->stock;
        $products->price = $request->price;
        $products->type = $request->type;
        $products->image = "";
        $products->unit = $request->unit;
        $products->status = 1; 
        $products->save();
        return redirect()->route('admin.product');
    }

    public function deleteProduct($id){
        $products = Product::find($id);       
        if($products !=null){       
            $products->delete();  
            return redirect()->route('admin.product');
        }      
    }
}
