<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Vehicle;
use App\Models\Company;
use App\Models\Sales;
class VehicleController extends Controller
{
    

    public function index()
    {
        $vehicles=DB::table('vehicles')
                            ->join('companies','vehicles.company_id','companies.id')
                            ->select('vehicles.*','companies.name')
                            ->get();

       
        $company=Company::all();
       return view('vehicle.index',compact('vehicles','company'));
    }
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'vehicle_number'=>'required|unique:vehicles|max:255',
           'owener_name'=>'required|max:255',
            'owener_phone'=>'required|max:255',
            'company_id'=>'required',
        ]);
        $vehicle=new Vehicle();
        $vehicle->vehicle_number=$request->vehicle_number;
        $vehicle->owener_name=$request->owener_name;
       
        $vehicle->owener_phone=$request->owener_phone;
        $vehicle->company_id=$request->company_id;
        $vehicle->save();
        $notification=array(
            'messege'=>' Successfully Added  new Vehicle',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function delete($id){

       $vehicle= Vehicle::find($id);
       $vehicle->delete();
        $notification=array(
            'messege'=>'Vehicle Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
     public function edit($id){

       $vehicles=Vehicle::find($id);
       $company=Company::all();
       return view('vehicle.edit',compact('vehicles','company'));
     }


    public function update(Request $request,$id)
        {
             
            $vehicle=Vehicle::find($id)->first(); 
           $data=array();
           if($vehicle->vehicle_number == $request->vehicle_number)
           {
               $data['owener_name']=$request->owener_name;
           $data['owener_phone']=$request->owener_phone;
           $data['company_id']=$request->company_id;
           $update=DB::table('vehicles')->where('id',$id)->update($data);
           }
          else {
            $validateData=$request->validate([
            'vehicle_number'=>'required|unique:vehicles|max:255',
               ]);
                $data['vehicle_number']=$request->vehicle_number;
                $update=DB::table('vehicles')->where('id',$id)->update($data);
          }
           
           
           if($update){

            $notification=array(
            'messege'=>'Vehicle Details Updated Successfully',
            'alert-type'=>'success'
        );}
        else {
            $notification=array(
            'messege'=>'Nothing To Update',
            'alert-type'=>'warning'
        );
        }
         return redirect()->route('vehicle')->with($notification);
    }
        
    public function show($id)
    {
        $vehicle=Vehicle::find($id); 
        $sales=Sales::where('client_id',$id)->get();
        $company=Company::where('id',$vehicle->company_id)->first();
        $total=DB::table('sales')->where('client_id',$id)->sum('total_amount');
        $paid=DB::table('sales')->where('client_id',$id)->sum('paid_amount');
        $due=DB::table('sales')->where('client_id',$id)->sum('due_amount');
        $quantity=DB::table('sales')->where('client_id',$id)->sum('quantity');
        return view('vehicle.show',compact('vehicle','company','total','paid','due','quantity','sales'));
    }
     public function getvehicle($company_id){
        $vehicle=DB::table('vehicles')->where('company_id',$company_id)->get();
        return json_encode($vehicle);

    }
}

