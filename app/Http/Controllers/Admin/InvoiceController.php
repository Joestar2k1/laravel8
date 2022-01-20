<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InvoiceController extends Controller
{
    public function showInvoice(){
        $data = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->select('users.fullName','invoices.id','invoices.dateCreated','shippingName','shippingPhone','shippingAddress','total','invoices.status')->paginate(2);
        return view('admin.invoices.index',compact('data'));
    }
    public function createInvoice(){
        
    }
}
