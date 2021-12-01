@extends('layouts.app')

@section('content')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 bg-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ {{$sale}}</h3>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                <div>
                  <span class="tx-11 tx-white-6">Payment Received</span>
                  <h6 class="tx-white mg-b-0">৳ {{$payment}}</h6>
                </div>
                <div>
                  <span class="tx-11 tx-white-6">Payment Due</span>
                  <h6 class="tx-white mg-b-0">৳ {{$due}}</h6>
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 bg-info">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sale</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ {{$today}}</h3>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                <div>
                  <span class="tx-11 tx-white-6">Payment Received Today</span>
                  <h6 class="tx-white mg-b-0">৳ {{$payment_today}}</h6>
                </div>
                <div>
                  <span class="tx-11 tx-white-6">Payment Due Today</span>
                  <h6 class="tx-white mg-b-0">৳ {{$due_today}}</h6>
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Available Fuel Quantity</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$available_fuel}} ltr</h3>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                <div>
                  <span class="tx-11 tx-white-6">Total Fuel Sold Quantity</span>
                  <h6 class="tx-white mg-b-0">{{$quantity}} ltr</h6>
                </div>
                <div>
                  <span class="tx-11 tx-white-6">Total Fuel Quantity</span>
                  <h6 class="tx-white mg-b-0">{{$total_fuel}} ltr</h6>
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-sl-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Sales Done</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$total_sales}}</h3>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                <div>
                  <span class="tx-11 tx-white-6">Total Listed Vehicles</span>
                  <h6 class="tx-white mg-b-0">{{$vehicles}}</h6>
                </div>
                <div>
                  <span class="tx-11 tx-white-6">Total Listed Companys</span>
                  <h6 class="tx-white mg-b-0">{{$companies}}</h6>
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
         <div class="card pd-10 pd-sm-40">
          <h6 class="card-body-title">Sales List
         </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">ID</th>
                   <th class="wd-10p">Company <br> Name</th>
                   <th class="wd-10p">Vehicle <br> Number</th>
                   <th class="wd-10p">Driver <br> Name</th>
                   <th class="wd-10p">Cashier <br> Name</th>
                   <th class="wd-10p">Quantity</th>
                  <th class="wd-10p">Payable Amount</th>
                  <th class="wd-10p">Paid Amount</th>
                  <th class="wd-10p">Due Amount</th>
                   <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($sales as $key=>$sale)
                    
             
                <tr>
                  <td>{{$key +1}}</td>
                  <td>{{$sale->name}}</td>
                  <td>{{$sale->vehicle_number}}</td> 
                  <?php $driver=DB::table('vehicles')->where('id',$sale->client_id)->first();?>
                  <td>{{$driver->owener_name}}</td>
                  <?php $employee = DB::table('users')->where('id', $sale->employee_id)->first(); ?>
                  <td>{{$employee->name}}</td>
                  <td>{{$sale->quantity}}</td>
                  <td>{{$sale->total_amount}}</td>
                  <td>{{$sale->paid_amount}}</td>
                  <td>{{$sale->due_amount}}</td>
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

        </div><!-- card -->

      </div><!-- sl-pagebody -->
      <footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
          <div>Made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

     
@endsection
