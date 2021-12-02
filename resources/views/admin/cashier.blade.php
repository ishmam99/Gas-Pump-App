@extends('layouts.app')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Vehicles Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Vehicles List
         <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a></h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                   <th class="wd-15p">Cashier Name</th>
                   <th class="wd-15p">Sales Done</th>
                  <th class="wd-15p">Payment Collected</th>
                  <th class="wd-20p">Payment Due</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($cashiers as $key=>$cashier)
                    
             
                <tr>
                  <td>{{$key +1}}</td>
                   <td>{{$cashier->name}}</td>
                   <?php $sales=DB::table('sales')->where('employee_id',$cashier->id)->count('id');
                   $paid=DB::table('sales')->where('employee_id',$cashier->id)->sum('paid_amount');
                   $due=DB::table('sales')->where('employee_id',$cashier->id)->sum('due_amount');
                   ?>
                  <td>{{$sales}}</td>
                   <td>{{$paid}}</td> 
                   <td>{{$due}}</td>
                  <td>
                      <a href="{{route('show.cashier',['id' => $cashier->id]) }}" class="btn btn-sm btn-info">Show Details</a>
                      
                      <a href="{{route('delete.cashier',['id' => $cashier->id])}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                  
                </tr>   @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

  

      </div><!-- sl-pagebody -->
      <footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2021. Ishmam Bin Azim. All Rights Reserved.</div>
          
      
      </footer>
 
       

@endsection