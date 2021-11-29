@extends('layouts.app')
@section('content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
  
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Company Details</h6>
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
              <form method="POST" action="{{route('update.company',['id'=>$company->id])}}">
                @csrf
              <div class="modal-body pd-20">
               
                  <div class="form-group">
                    <label for="category">Company Name</label>
                    
                     <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$company->name}}">

                  </div>
                  <div class="form-group">
                    <label for="category">Company Phone</label>
                    
                    <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$company->phone}}">


                  </div>
           
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
                 </form>
          </div><!-- modal-dialog -->
       
      </div>
</div>

@endsection