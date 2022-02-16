<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    public function showInvoice(){
         $invoices = DB::table('invoices')
        ->join('employees','invoices.employeeID','=','employees.id')
        ->join('users','invoices.userID','=','users.id')
        ->select(DB::raw('employees.fullName as nv'),'users.fullName','invoices.id','invoices.dateCreated','total','invoices.status','invoices.shippingAddress','invoices.isPaid')
        ->where('invoices.status',-1)->paginate(3) ;
        return view('admin.invoices.index',compact('invoices'));
    }
    public function orderTracking(){
        $countWaitingToAccept = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',0)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        $countConfirmed = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',1)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        $countDelivery = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',2)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        $countSuccess = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.status',-1)
        ->select(DB::raw('COUNT(invoices.id) as SL'))
        ->get();
        return view('admin.invoices.order_tracking',
            [
                'WaitingToAccept'=>$countWaitingToAccept[0]->SL,
                'Confirmed'=>$countConfirmed[0]->SL,
                'Delivery'=>$countDelivery[0]->SL,
                'Success'=>$countSuccess[0]->SL,
            ]
        );
    }
    public function detailsInvoice($invoiceID){
        $invoices = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.id',$invoiceID)
        ->select('users.fullName','invoices.id','invoices.dateCreated','invoices.total','invoices.status','invoices.shippingAddress','invoices.shippingPhone','invoices.shippingName','invoices.isPaid')->get();
        $invoice_details = DB::table('invoice_details')
        ->join('products','invoice_details.productID','=','products.id')
        ->where('invoice_details.invoiceID',$invoiceID)->get();
        return view('admin.invoices.details',compact('invoices','invoice_details'));
    }

    public function detailsOrderTracking($invoiceID){
        $invoices = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->where('invoices.id',$invoiceID)
        ->select('users.fullName','invoices.id','invoices.dateCreated','invoices.total','invoices.status','invoices.shippingAddress','invoices.shippingPhone','invoices.shippingName','invoices.isPaid')->get();

        $invoice_details = DB::table('invoice_details')
        ->join('products','invoice_details.productID','=','products.id')
        ->where('invoice_details.invoiceID',$invoiceID)->get();


        return view('admin.invoices.details_order',compact('invoices','invoice_details'));
    }


    public function handleConfirmStatus($id){
        $select_status_invoice =  DB::table('invoices')
        ->where('id',$id)
        ->select('status')->get();
        $int_status = $select_status_invoice[0]->status;
        if($int_status==2){
            $update = DB::table('invoices')
            ->where('id',$id)
            ->update(['status' => -1]);
        }else{      
            if($int_status == 0){
                $update = DB::table('invoices')
                ->where('id',$id)
                ->whereBetween('status',[0,4])
                ->update(['status' => $int_status+1,'employeeID'=>Session::get('emp')->id]);
            }else{
                $update = DB::table('invoices')
                ->where('id',$id)
                ->whereBetween('status',[0,4])
                ->update(['status' => $int_status+1]);
            }
        }
       
        if($int_status==0){
            return redirect()->route('admin.invoice.waiting');
        }else if($int_status==1){
            return redirect()->route('admin.invoice.confirmed');
        }
        else if($int_status==2){
            return redirect()->route('admin.invoice.delivery');
        }
        else if($int_status==3){
            return redirect()->route('admin.invoice.delivery');
        }
    }

    public function waitingToAccept(){
        $load = DB::table('invoices')
        ->select('invoices.*')
        ->where('invoices.status',0)    
        ->addSelect(DB::raw("null as products"))->get();

        foreach($load as $item){
            $item->products = DB::table('invoice_details')
            ->join('products','invoice_details.productID','products.id')
            ->where('invoice_details.invoiceID',$item->id)
            ->select('products.*','invoice_details.quantity')->get();
        }
        return view('admin.invoices.order_tracking_details.waiting',compact('load'));
    }

    public function confirmed(){
        $load = DB::table('invoices')
        ->select('invoices.*')
        ->where('invoices.status',1)    
        ->addSelect(DB::raw("null as products"))->get();
        foreach($load as $item){
            $item->products = DB::table('invoice_details')
            ->join('products','invoice_details.productID','products.id')
            ->where('invoice_details.invoiceID',$item->id)
            ->select('products.*','invoice_details.quantity')->get();
        }
        return view('admin.invoices.order_tracking_details.confirmed',compact('load'));
    }
    public function onDelivery(){
        $load = DB::table('invoices')
        ->select('invoices.*')
        ->where('invoices.status',2)    
        ->addSelect(DB::raw("null as products"))->get();
        foreach($load as $item){
            $item->products = DB::table('invoice_details')
            ->join('products','invoice_details.productID','products.id')
            ->where('invoice_details.invoiceID',$item->id)
            ->select('products.*','invoice_details.quantity')->get();
        }
        return view('admin.invoices.order_tracking_details.onDelivery',compact('load'));
    }
    public function success(){
        $load = DB::table('invoices')
        ->join('users','invoices.userID','=','users.id')
        ->join('employees','invoices.employeeID','=','employees.id')
        ->select('invoices.*','users.fullName',DB::Raw('employees.fullName as NV'))
        ->where('invoices.status',-1)    
       ->get();
        return view('admin.invoices.order_tracking_details.success',compact('load'));
    }
}
