<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Vehicle;
use DB;
use Carbon\Carbon;
class CompanyController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    //
    public function company()
    {
       $companies=Company::all();
       return view('company.index',compact('companies'));
    }
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required|unique:companies|max:255',
           
            'phone'=>'required|unique:companies|max:255',
        ]);
        $company=new Company();
        $company->name=$request->name;
       
         $company->phone=$request->phone;
        $company->save();
        $notification=array(
            'messege'=>' Successfully Added  new Company',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function delete($id){

       $company= Company::find($id);
       $company->delete();
        $notification=array(
            'messege'=>'Company Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
     public function edit($id){

       $company=Company::find($id);
     return view('company.edit',compact('company'));
     }


    public function update(Request $request)
        {
             
            $company=Company::find($request->id)->first(); 
           if($company->name!=$request->name )
           {
                $validateData=$request->validate([
            'name'=>'required|unique:companies|max:255',                    
        ]);
            $company->name=$request->name;}
            if($company->phone!=$request->phone)
            { $validateData=$request->validate([
            'phone'=>'required|unique:companies|max:255', 
            ]); 
                $company->phone=$request->phone;
            }
           
           $company->save();
            $notification=array(
            'messege'=>'Company Deleted Successfully',
            'alert-type'=>'success'
        );
         return redirect()->route('company')->with($notification);
    }
    public function view($id)
    {
        $sales=DB::table('sales')
                            ->join('vehicles','sales.client_id','vehicles.id')
                            ->select('sales.*','vehicles.owener_name')
                            ->where('sales.company_id',$id)
                            ->get();
       
        $company=Company::where('id',$id)->first();
        $vehicle=Vehicle::where('company_id',$id)->get();
       
        return view('company.view',compact('sales','company','vehicle'));
    }
      public function report(Request $request,$id)
    {
        
        $date1=Carbon::createFromFormat('Y-m-d', $request->start);
        $date2=Carbon::createFromFormat('Y-m-d', $request->end); 
        $sales=DB::table('sales')
                            ->where('sales.company_id',$id) 
                             ->whereBetween('created_at', [$date1, $date2])
                            ->get();
      
        $company=Company::where('id',$id)->first();
        $vehicle=Vehicle::where('company_id',$id)->get();
       
       return view('company.view',compact('sales','company','vehicle'));
    }

    public function vehicle($id)
    {
         $vehicles=DB::table('vehicles')->where('company_id',$id)->get();
                           
        $company=Company::where('id',$id)->first();
       
                            return view('company.vehicle',compact('vehicles','company'));
    }
    
}
