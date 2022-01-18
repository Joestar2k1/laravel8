<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Product;

class ProductController extends Controller
{
    public function loadProduct(){
        $data =DB::table('products')->paginate(4);
        return view('admin.products.index',compact('data'));
    }
    public function viewCreate(){
        return view('admin.products.create');
    }
    public function createProduct(){
        $countPrd = Product::all()->count();
        $randomID = 'f23112001pr' .  $countPrd;

        $products = new Product;
        
        $products->id = $randomID;
        $products->sku = $request->sku;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->stock = $request->stock;
        $products->price = $request->price;
        $products->type = $request->type;
        $products->image = $request->image;
        $products->unit = $request->unit;
        $products->status = $request->status; 
        $products->save();
        return view('admin.product',compact('data'));
    }
}
