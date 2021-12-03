@extends('layouts.app')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->

      

      <div class="sl-pagebody">
       
  
         
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h3 class="tx-15 mg-b-10 tx-uppercase tx-inverse tx-bold">Update Vehicle Details</h3>
                
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
              
              <form method="POST" action="{{route('update.vehicle',['id'=>$vehicles->id])}}">
                @csrf
              <div class="modal-body pd-20 mg-20">
               <div class="form-group">
                    <label for="category">Vehicle Number</label>
                    <input type="text" class="form-control" placeholder="Vehcile Number" value="{{$vehicles->vehicle_number}}" name="vehicle_number">

                  </div>
                  <div class="form-group">
                    <label for="category">Company Name</label>
                    <select class="form-control select2" data-placeholder="Choose Category" name="company_id">
                  @foreach ($company as $item)
                        <option value="{{$item->id}}"<?php if ($vehicles->company_id==$item->id) {
                            echo "Selected"; } ?> >{{$item->name}}</option>
                    @endforeach
                   
                    
                  </select>

                  </div>
                  <div class="form-group">
                    <label for="category">Owener Name</label>
                    <input type="text" class="form-control" placeholder="Category Name" value="{{$vehicles->owener_name}}" name="owener_name">

                  </div>
                  <div class="form-group">
                    <label for="category">Owener Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" value="{{$vehicles->owener_phone}}" name="owener_phone">

                  </div>
           
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            
                 </form>
          
       </div>

      </div><!-- sl-pagebody -->
       
    
  

@endsection