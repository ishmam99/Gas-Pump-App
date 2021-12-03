<?php $bg=3;?>
@extends('layouts.app')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Company Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Companies List
         <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a></h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Company name</th>
                  <th class="wd-20p">Phone</th>
                   <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($companies as $key=>$company)
                    
             
                <tr>
                 
                      
                  
                  <td>{{$key+1}}</td>
                  <td><a href="{{route('vehicle.company',['id'=>$company->id])}}">{{$company->name}}</a></td>
                   <td>{{$company->phone}}</td>
                  <td>
                      <a href="{{route('edit.company',['id' => $company->id]) }}" class="btn btn-sm btn-info">Edit</a>
                      <a href="{{route('view.company',['id' => $company->id]) }}" class="btn btn-sm btn-success">Sales Report</a>
                      <a href="{{route('delete.company',['id' => $company->id])}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  </td>
                  
                 </tr>  
                 @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

  

      </div><!-- sl-pagebody -->
      

    <!-- ########## END: MAIN PANEL ########## -->
          <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content tx-size-lg">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add new Company</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> 
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                    </ul>
                </div>
                  
              @endif
              <form method="POST" action="{{route('store.company')}}">
                @csrf
              <div class="modal-body">
               
                  <div class="form-group">
                    <label for="category">Company Name</label>
                    <input type="text" class="form-control" placeholder="Category Name" name="name">

                  </div>
                  <div class="form-group">
                    <label for="category">Company Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="phone">

                  </div>
              </div>
             <!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
           
                 </form> </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
       

@endsection