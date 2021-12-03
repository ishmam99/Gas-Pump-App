<?php $bg=4;?>
@extends('layouts.app')

@section('content')	

      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Filling Station</a>
        <span class="breadcrumb-item active">Vehicle Section</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Show Vehicle Details</h5>
         
        </div>
    
        <div class="card pd-20 pd-sm-40">
            
            <h6 class="card-body-title">
          <a href="{{route('edit.vehicle',['id' => $vehicle->id]) }}" class="btn btn-info btn-sm pull-right">Update Vehicle Details</a></h6>
            <div class="single_product">
                <div class="container">
                    <div class="row">

                        <!-- Description -->
                        <div class="col-lg-5">
                            <div class="product_description">
                                <div class="text-primary"><h4>Vehicle Owener : {{$vehicle->owener_name}} </h4></div>
                                <div class="text-primary"><h6>Phone : {{$vehicle->owener_phone}}</h6></div>
                                <div class="text-warning"><h6>Company : {{$company->name}}</h6></div>	
                                <hr><hr>
                                
                                <div><h6>Total Purchased Amount : <span class="text-success">৳ {{$total}}</span></h6></div>
                                <div><h6>Total Purchased Quantity : <span class="text-success">{{$quantity}} ltr</span></h6></div>
                                <div><h6>Total Payment  : <span class="text-success">৳ {{$paid}}</span></h6></div>
                                <div><h6>Total Due : <span class="text-success">৳ {{$due}}</span></h6></div>
                                <hr><hr>
                            </div>
                        </div>
                <div class="col-lg-12">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                           <thead>
                              <tr>
                                <th class="wd-10p">ID</th>
                               
                                <th class="wd-10p">Cashier <br> Name</th>
                                <th class="wd-10p">Driver <br> Name</th>
                                <th class="wd-10p">Quantity</th>
                                <th class="wd-10p">Payable <br> Amount</th>
                                <th class="wd-10p">Paid <br> Amount</th>
                                <th class="wd-10p">Due <br> Amount</th>
                                <th class="wd-10p">Date </th>
                                <th class="wd-20p">Action</th>
                  
                              </tr>
                            </thead>
                         <tbody>
                      @foreach ($sales as $key=>$sale)
                    
             
                            <tr>
                            <td>{{$key +1}}</td>
                              <?php $employee = DB::table('users')->where('id', $sale->employee_id)->first(); ?>
                            <td>{{$employee->name}}</td>
                            <td>{{$sale->driver_name}}</td>
                            <td>{{$sale->quantity}}</td>
                            <td>{{$sale->total_amount}}</td>
                            <td>{{$sale->paid_amount}}</td>
                            <td>{{$sale->due_amount}}</td>
                            
                            <td>{{Carbon\Carbon::parse($sale->created_at)->diffForHumans()}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                
                                {{-- {{route('edit.sales',['id' => $sale->id]) }} --}}
                                <a href="{{route('paid.sales',['id' => $sale->id])}}" class="btn btn-sm btn-success" id="paid">Make Paid</a>
                                <a href="{{route('delete.sales',['id' => $sale->id])}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            </td>
                            
                         </tr>   @endforeach
                       </tbody>
                     </table>
                    </div><!-- table-wrapper -->
                  </div>
    			</div>
	        </div>
	      </div>
      </div>    
   </div>    

@endsection