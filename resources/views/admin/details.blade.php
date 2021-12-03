<?php $bg=6;?>
@extends('layouts.app')

@section('content')	

      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Filling Station</a>
        <span class="breadcrumb-item active">Cashier Section</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Show Cashier Details</h5>
         
        </div>
    
        <div class="card pd-20 pd-sm-40">
            
            <h6 class="card-body-title">
       Cashier Details</h6>
            <div class="single_product">
                <div class="container">
                    <div class="row">

                        <!-- Description -->
                        <div class="col-lg-5">
                            <div class="product_description">
                                <div class="text-primary"><h4>Cashier Name : {{$cashier->name}} </h4></div>
                                <div class="text-primary"><h6>Email : {{$cashier->email}}</h6></div>
                              	
                                <hr><hr>
                                <?php $total=DB::table('sales')->where('employee_id',$cashier->id)->sum('total_amount');
                                 $quantity=DB::table('sales')->where('employee_id',$cashier->id)->sum('quantity') ;
                                  $payment=DB::table('sales')->where('employee_id',$cashier->id)->sum('paid_amount');
                                   $due=DB::table('sales')->where('employee_id',$cashier->id)->sum('due_amount');
                                  ?>
                                <div><h6>Total Sold Amount : <span class="text-success">৳ {{$total}}</span></h6></div>
                                <div><h6>Total Sold Quantity : <span class="text-success">{{$quantity}} ltr</span></h6></div>
                                <div><h6>Total Payment Received : <span class="text-success">৳ {{$payment}}</span></h6></div>
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
                               <th class="wd-10p">Invoice <br> Number</th>
                                <th class="wd-10p">Vehicle <br> Number</th>
                                <th class="wd-10p">Quantity</th>
                                <th class="wd-10p">Payable <br> Amount</th>
                                <th class="wd-10p">Paid <br> Amount</th>
                                <th class="wd-10p">Due <br> Amount</th>
                                <th class="wd-10p">Time <br> Date </th>
                                <th class="wd-20p">Action</th>
                  
                              </tr>
                            </thead>
                         <tbody>
                      @foreach ($sales as $key=>$sale)
                    
             
                            <tr>
                            <td>{{$key +1}}</td>
                               <?php $serial= sprintf("%06s", $sale->id) ?>
                            <td>{{$serial}}</td>
                              <?php $vehicle = DB::table('vehicles')->where('id', $sale->client_id)->first(); ?>
                            <td>{{$vehicle->vehicle_number}}</td>
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