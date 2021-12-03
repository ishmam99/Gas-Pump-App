
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
>
      

      <div class="sl-pagebody">
        
          <div class="container"  >
              
            <div class="col-md-5">
            <button onclick="printDiv('container')" class="btn btn-success"><i class="fa fa-print"></i> Print </button>
       
          <form action="{{route('report.company',['id'=>$company->id])}}" method="POST">
            @csrf
            <label for="Starting Date">Starting Date</label>
            <input type="date" class="form-control" name="start" required>
            <label for="Ending Date">Ending Date</label>
            <input type="date" class="form-control" name="end">
            <button class="btn btn-warning" type="submit">Get Report</button>
          </form>
          <br>
           <form action="{{route('report.company',['id'=>$company->id])}}" method="POST">
            @csrf
            
            <input type="number" hidden value="1" class="form-control" name="today">
            <button class="btn btn-primary" type="submit">Get Today's Report</button>
          </form>
        
        </div> <br>

               

           <div class="row">
                <div class="col-12" id="container"style="background-color: white">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-10 text-center">
                              <h4 >
                             <i class="fa fa-gas-pump"></i>  M/S Mohona Filling Station & Service Center
                           </h4> 
                              
                              
                            </div>
                            <div class="col-2">
                              <small class="float-right">Date: {{Carbon\Carbon::now()->format('d-m-Y');}} <br> <b>Invoice #000</b></small>
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
                                <strong>Name : {{$company->name}}</strong><br>
                                
                             
                                Phone : {{$company->phone}}<br>
                               
                              </address>
                            </div>
                            <!-- /.col -->
                           
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row justify-content-end">
                            <div class="col-12 table">
                              <table id="datatable2" class="table table-bordered">
                                <thead>
                                <tr>
                                  <th>Num</th>
                                 
                                  <th>Vehicle Number</th>
                                 <th>Driver Name</th>
                                   <th>Quantity</th>
                                   <th>Billing Amount</th>
                                   <th>Paid Amount</th>
                                   <th>Due Amount</th>
                                    <th>Date</th>
                                 
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $quantity=0;
                                $total_amount=0;
                                $paid_amount=0;
                                $due_amount=0;
                                ?>
                                      
                                @foreach ($sales as $key=>$item)
                                    
                               
                                <tr>
                                  <td>{{$key+1}}</td>
                                <?php $vehicle=DB::table('vehicles')->where('id',$item->client_id)->first();?>
                                  <td>{{$vehicle->vehicle_number}}</td>
                                <td>{{$item->driver_name}}</td>
                                  <td <?php $quantity=$quantity+$item->quantity?>>{{$item->quantity}} ltr</td>
                                  
                                  <td <?php $total_amount=$total_amount+$item->total_amount ?>> {{$item->total_amount}}</td>
                                  <td <?php $paid_amount=$paid_amount+$item->paid_amount?>>{{$item->paid_amount}}</td>
                                  <td <?php $due_amount=$due_amount+$item->due_amount?>>{{$item->due_amount}}</td>
                                  <td>{{Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                                </tr>  
                                @endforeach
                               
                                </tbody>
                                
                               <tfoot>
                                   <td></td>
                                   <td>TOTAL</td>
                                   <td></td>
                                   <td> <?php echo $quantity ?> l</td>
                                   <td>৳ <?php echo $total_amount ?> </td>
                                    <td>৳ <?php echo $paid_amount ?> </td>
                                   <td>৳ <?php echo $due_amount ?> </td>
                                   <td></td>
                               </tfoot>
                               
                              </table>
                            </div>
                            <!-- /.col -->
                          
                          <!-- /.row -->

                        
                            <!-- accepted payments column -->
                            
                            
                            <div class="col-4 order-3" >
                             

                              
                                <table class="table">
                                  <tbody><tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td >৳ <?php echo $total_amount ?> </td>
                                  </tr>
                                  <tr>
                                    <th>Paid Amount</th>
                                    <td>৳ <?php echo $paid_amount ?> </td>
                                  </tr>
                                 
                                  
                                  
                                </tbody>
                              <tfoot><th>Due Amount</th>
                                    <td>৳ <?php echo $due_amount ?></td>
                                </tfoot></table>
                             
                            </div>
                            <!-- /.col -->
                        
                          <!-- /.row -->

                          <!-- this row will not appear when printing -->
                          </div>

                        </div>
                        <!-- /.invoice -->
                      </div>


        
        </div>  {{-- row --}}
       
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
        function calculate(){
          var table = $('#datatable1').DataTable();
            table.column( 3 ).data().sum();
             $('#datatable1').DataTable( {
    drawCallback: function () {
      var api = this.api();
      $( api.table().footer() ).html(
        api.column( 4, {page:'current'} ).data().sum()
      );
    }
  } );
        }
	</script>
@endsection