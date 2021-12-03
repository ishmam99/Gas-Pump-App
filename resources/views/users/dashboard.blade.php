@extends('layouts.app')
 <?php $sales=DB::table('sales')->where('employee_id',Auth::user()->id)->count('id');
                   $paid=DB::table('sales')->where('employee_id',Auth::user()->id)->sum('paid_amount');
                    $total=DB::table('sales')->where('employee_id',Auth::user()->id)->sum('total_amount');
                   $due=DB::table('sales')->where('employee_id',Auth::user()->id)->sum('due_amount');
                   ?>
@section('content')	

      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Filling Station</a>
        <span class="breadcrumb-item active">Cashier Section</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Welcome {{Auth::user()->name}}</h5>
         
        </div>
    
      
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-4">
            <div class="card pd-20 bg-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Transaction Done By You</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ {{$total}}</h3>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                <div>
                  <span class="tx-11 tx-white-6">Payment Received</span>
                  <h6 class="tx-white mg-b-0">৳ {{$paid}}</h6>
                </div>
                <div>
                  <span class="tx-11 tx-white-6">Payment Due</span>
                  <h6 class="tx-white mg-b-0">৳ {{$due}}</h6>
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div><!-- col-3 -->
         
          <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Available Fuel Quantity</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$total_fuel}} ltr</h3>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                <div>
                  <span class="tx-11 tx-white-6">Total Fuel Sold Quantity</span>
                  <h6 class="tx-white mg-b-0">{{$quantity}} ltr</h6>
                </div>
                <div>
                  <span class="tx-11 tx-white-6">Available Fuel's Name</span>
                   <h6 class="tx-white mg-b-0">@foreach ($available_fuel as $item)
                      
                 {{$item->product_name}} @endforeach </h6>
                 
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-sl-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Sales Done By You</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$sales}}</h3>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                <div>
                  <span class="tx-11 tx-white-6">Total Listed Vehicles</span>
                  <h6 class="tx-white mg-b-0">{{$vehicles}}</h6>
                </div>
                <div>
                  <span class="tx-11 tx-white-6">Total Listed Companies</span>
                  <h6 class="tx-white mg-b-0">{{$companies}}</h6>
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row --> 
      <div class="card pd-20 pd-sm-40">
            
            <h6 class="card-body-title">
               Cashier Sales Table</h6>
            <div class="single_product">
                <div class="container">
                   

            <div class="row">
    
                        
                <div class="col-lg-10">
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                           <thead>
                              <tr>
                                <th class="wd-10p">ID</th>
                               <th class="wd-10p">Invoice <br> Number</th>
                                <th class="wd-10p">Vehicle <br> Number</th>
                                <th class="wd-10p">Quantity</th>
                                <th class="wd-10p">Payable Amount</th>
                                <th class="wd-10p">Paid Amount</th>
                                <th class="wd-10p">Due Amount</th>
                                <th class="wd-10p">Date </th>
                                <th class="wd-20p">Action</th>
                  
                              </tr>
                            </thead>
                         <tbody>
                      @foreach ($sold as $key=>$sale)
                    
             
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
    			</div> <!-- Row -->
	       
   </div>    
            </div>
      </div>
      </div>
      
@endsection