<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Vehicle;
use Auth;
use DB;

class SalesController extends Controller
{
    public function index()
    {
        $company=Company::all();
        $product=Product::all();
        return view('product.sale',compact('company','product'));
        
    }
    public function create(Request $request)
    { 
        $sale=new Sales();
        $sale->client_id=$request->vehicle;
        $vehicle=Vehicle::where('id',$request->vehicle)->first();
        $sale->driver_name=$request->driver_name;
        $sale->company_id=$request->company_id;
        $sale->fuel_id=$request->product_id;
        $product=Product::where('id',$request->product_id)->first();
        $updated_quantity=($product->product_quantity)-($request->quantity);
        $product->product_quantity=$updated_quantity;
        $product->update();
        $sale->paid_amount=$request->paid_amount;
        $sale->quantity=$request->quantity;
        $sale->due_amount=$request->due_amount;
        $sale->total_amount=$request->total_amount;
        $sale->employee_id=Auth::user()->id;
        $sale->phone=$vehicle->owener_phone;
        $sale->save();
        return redirect()->route('invoice',['id'=>$sale->id]);
    }
    public function invoice($id)
    {
        $sales=Sales::find($id);
        $product=DB::table('products')->where('id',$sales->fuel_id)->first();
        $client=DB::table('vehicles')->where('id',$sales->client_id)->first();
        $company=DB::table('companies')->where('id',$client->company_id)->first();
        return view('invoice',compact('sales','product','client','company'));
    }
     public function delete($id){

       $sales= Sales::find($id);
       $sales->delete();
        $notification=array(
            'messege'=>'Sales Data Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
     public function paid($id){

       $sales= Sales::find($id);
       $total_amount=$sales->due_amount+$sales->paid_amount;
       $sales->paid_amount=$total_amount;
       $sales->due_amount=0;
       $sales->update();
        $notification=array(
            'messege'=>'Sales Data Paid Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
