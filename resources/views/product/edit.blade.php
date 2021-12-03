<?php $bg=5;?>
@extends('layouts.app')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
   
      
 
      <div class="sl-pagebody">
        <div class="sl-page-title">
        

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Products Update
        </h6>

          <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h3 class="tx-15 mg-b-10 tx-uppercase tx-inverse tx-bold">Update</h3>
               
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
              
              <form method="POST" action="{{route('update.product',['id'=>$product->id])}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20 mg-20">
               <div class="form-group">
                    <label for="category">Product Name</label>
                    <input type="text" class="form-control" placeholder="Product Name" value="{{$product->product_name}}" name="product_name">

                  </div>
                
                  <div class="form-group">
                        <label for="category">Product Image</label>
                  </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                              
                           
                                <img src="{{URL::to($product->product_img)}}" height="120px" width="100px" id="img">
                 
                           
                                <input type="file" id="file" class="form-control" name="product_img" onchange="readURL(this);">
                                 
                            </div>
                 
                        </div>
                  
                  </div>
                  {{-- <img src="#" id="img" alt=""> --}}
                
                  <div class="form-group">
                    <label for="category">Quantity</label>
                    <input type="text" class="form-control" placeholder="Quantity" value="{{$product->product_quantity}}" name="product_quantity">

                  </div>
                  <div class="form-group">
                    <label for="category">Buying Price</label>
                    <input type="text" class="form-control" placeholder="Buying Price" value="{{$product->buying_price}}" name="buying_price">

                  </div>
                   
                  <div class="form-group">
                    <label for="category">Selling Price</label>
                    <input type="text" class="form-control" placeholder="Selling Price" value="{{$product->selling_price}}" name="selling_price">
</div>
                  </div>
           
             <!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
              <a href="javascript:history.back()"> <button type="button" class="btn btn-secondary pd-x-20" >Close</button></a>
              </div>
            
                 </form>
        </div><!-- card -->

      </div>
    </div>

      </div><!-- sl-pagebody -->
     
    
    <!-- ########## END: MAIN PANEL ########## -->
          <!-- LARGE MODAL -->
       


    
<script>
      function readURL(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload= function(e){
            $('#img')
            .attr('src',e.target.result)
            .width(100)
            .height(100);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script> 
@endsection