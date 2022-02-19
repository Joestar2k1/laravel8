<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
class InvoiceController extends Controller
{
    public function createInvoice(Request $request){
        $date = Date('Ymd');
        $count = Invoice::All()->count();
        $randomID = 'inv'.$date . $count+1;
        $invoices = new Invoice;

        $invoices->id = $randomID;
        $invoices->userID = Session::get('customers')->id;
        $invoices->shippingName = $request->shippingName;
        $invoices->shippingAddress = $request->shippingAddress;
        $invoices->shippingPhone = $request->shippingPhone;
        $invoices->total = Session::get('carts_total')[0];
        $invoices->dateCreated = Date('Y-m-d H:i:s');
        $invoices->isPaid = 0;
        $invoices->status = 0;
        $invoices->save();
        //thêm chi tiết hóa đơn
        $getCarts = Session::get('carts');
        foreach($getCarts as $cart){
            $count_details = InvoiceDetails::All()->count();
            $inv_details = new InvoiceDetails;
            
            $inv_details->id = $count_details+1;
            $inv_details->invoiceID = $randomID;
            $inv_details->productID = $cart->id;
            $inv_details->quantity = $cart->quantity;
            $inv_details->save();
        }
        Session::forget('carts');
        Session::forget('carts_total');
        Session::put('carts',[]);
        return redirect()->route('user.order_management');
    }
}
