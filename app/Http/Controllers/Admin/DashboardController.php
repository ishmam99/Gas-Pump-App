<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Product;
use App\Models\Sales;
use App\Models\User;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $sales=DB::table('sales')
                            ->join('companies','sales.company_id','companies.id')
                            ->select('sales.*','companies.name')
                            ->get();
        $total_sales=DB::table('sales')->count('id');
        $vehicles=DB::table('vehicles')->count('id');
        $companies=DB::table('companies')->count('id');
        $sale=DB::table('sales')->sum('total_amount');
        $today=DB::table('sales')->where('created_at', '>=', Carbon::today())->sum('total_amount');
        $payment_today=DB::table('sales')->where('created_at', '>=', Carbon::today())->sum('paid_amount');
        $due_today=DB::table('sales')->where('created_at', '>=', Carbon::today())->sum('due_amount');
        $payment=DB::table('sales')->sum('paid_amount');
        $due=DB::table('sales')->sum('due_amount');
        $quantity=DB::table('sales')->sum('quantity');
        $total_fuel=DB::table('products')->sum('product_quantity');
        $available_fuel=DB::table('products')->get();
        $products=Product::all();
        return view('admin.dashboard',compact('sales','sale','payment','due','quantity','total_fuel','available_fuel','today','payment_today','due_today','total_sales','vehicles','companies','products'));
    }
    public function user()
    {
        $sold=Sales::where('employee_id',Auth::user()->id)->get();
      
         $quantity=DB::table('sales')->sum('quantity');
        $total_fuel=DB::table('products')->sum('product_quantity');
        $available_fuel=DB::table('products')->get();
         $vehicles=DB::table('vehicles')->count('id');
        $companies=DB::table('companies')->count('id');
        return view('users.dashboard',compact('sold','quantity','total_fuel','available_fuel','vehicles','companies'));
    }
      public function home()
    {
        return view('home');
    }
    public function logout(){
        Auth::logout();
        return Redirect()->route('welcome');
    }

    public function cashier()
    {
        $cashiers=User::where('role_id',2)->get();
        return view('admin.cashier',compact('cashiers'));
    }
     public function cashierShow($id)
    {
        $cashier=User::where('id',$id)->first();
        $sales=Sales::where('employee_id',$id)->get();
        return view('admin.details',compact('cashier','sales'));
    }
    public function cashierDelete($id){
        $cashier=User::where('id',$id)->first();
        $cashier->delete();
        $notification=array(
            'messege'=>'Cashier Data Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
