<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Sales;
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
        $available_fuel=$total_fuel-$quantity;
        return view('admin.dashboard',compact('sales','sale','payment','due','quantity','total_fuel','available_fuel','today','payment_today','due_today','total_sales','vehicles','companies'));
    }
    public function user()
    {
        return view('users.dashboard');
    }
      public function home()
    {
        return view('home');
    }
    public function logout(){
        Auth::logout();
        return Redirect()->route('welcome');
    }
}
