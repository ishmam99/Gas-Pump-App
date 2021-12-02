@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        
          <div class="container"  ><div class="col-md-10">
            <button onclick="printDiv('container')" class="btn btn-default"><i class="fa fa-print"></i> Print </button>
         
        </div> <br>
        <div class="row">
                <div class="col-10" id="container"style="background-color: white">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-10 text-center">
                              <h4 >
                             <i class="fa fa-gas-pump"></i>  M/S Mohona Filling Station & Service Center
                           </h4> 
                              <?php $serial= sprintf("%06s", $sales->id) ?>
                              
                            </div>
                            <div class="col-2">
                              <small class="float-right">Date: {{Carbon\Carbon::now()->format('d-m-Y');}} <br> <b>Invoice {{$serial}}</b></small>
                            </div>
                            <div class="col-10 text-center">
                              <p>Gabtoly,Mirpur,Dhaka-1216,Bangladesh      </p>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                             
                              <address>
                                <strong>Name : {{$client->owener_name}}</strong><br>
                                Driver Name : {{$sales->driver_name}} <br>
                              Company : {{$company->name}}<br>
                                Phone : {{$client->owener_phone}}<br>
                               
                              </address>
                            </div>
                            <!-- /.col -->
                           
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                <tr>
                                  <th>Num</th>
                                 
                                  <th>Vehicle Number</th>
                                  <th>Product</th>
                                   <th>Quantity</th>
                                  <th>Unit Price</th>
                                  <th>Subtotal</th>
                                 
                                </tr>
                                </thead>
                                <tbody>
                                
                                      
                                
                                <tr>
                                  <td>1</td>
                                <?php $vehicle=DB::table('vehicles')->where('id',$client->id)->first();?>
                                  <td>{{$vehicle->vehicle_number}}</td>
                                  <td>{{$product->product_name}}</td>
                                  <td>{{$sales->quantity}} ltr</td>
                                  <td>{{$product->selling_price}} ৳/ltr</td>
                                  <td>৳ {{$sales->total_amount}}</td>
                                </tr>  
                               
                               
                                </tbody>
                                <tfoot>
                                  <tr>
                                  <td></td>
                                <td></td>
                                <td></td><td></td>
                                <td>Total</td>
                                <td>৳ {{$sales->total_amount}}</td>
                                
                                </tr>
                                </tfoot>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <div class="row">
                            <!-- accepted payments column -->
                            
                            <!-- /.col -->
                            <div class="col-lg-8">
                              
                            </div>
                            <div class="col-lg-4" >
                             

                              <div class="table-bordered">
                                <table class="table">
                                  <tbody><tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>৳ {{$sales->total_amount}}</td>
                                  </tr>
                                  <tr>
                                    <th>Paid Amount</th>
                                    <td>৳ {{$sales->paid_amount}}</td>
                                  </tr>
                                 
                                  
                                  
                                </tbody>
                              <tfoot><th>Due Amount</th>
                                    <td>৳ {{$sales->due_amount}}</td>
                                </tfoot></table>
                              </div>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- this row will not appear when printing -->
                          

                        </div>
                        <!-- /.invoice -->
                      </div>


        </div>
    </div>
      </div>
      <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
@endsection