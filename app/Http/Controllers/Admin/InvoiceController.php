<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InvoiceController extends Controller
{
    public function showInvoice(){
        $invoices = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->select('users.fullName','invoices.id','invoices.dateCreated','total','invoices.status','invoices.shippingAddress')->paginate(3);
        
        
        return view('admin.invoices.index',compact('invoices'));
    }
    public function detailsInvoice($invoiceID){
        $invoices = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.id',$invoiceID)
        ->select('users.fullName','invoices.id','invoices.dateCreated','invoices.total','invoices.status','invoices.shippingAddress','invoices.shippingPhone','invoices.shippingName')->get();

        $invoice_details = DB::table('invoice_details')
        ->join('products','invoice_details.productID','=','products.id')
        ->where('invoice_details.invoiceID',$invoiceID)->get();

  
        return view('admin.invoices.details',compact('invoices','invoice_details'));
    }
}
