@extends('layouts.app')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      
 
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
           
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
                 </form>
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