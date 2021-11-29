@extends('layouts.app')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      
 
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Products Table</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Products List
         <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a></h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">ID</th>
                   <th class="wd-15p">Product Name</th>
                   <th class="wd-15p">Image</th>
                   <th class="wd-15p">Quantity</th>
                  
                  <th class="wd-15p">Buying Price</th>
                  <th class="wd-15p">Selling Price</th>
                   <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $key=>$product)
                    
             
                <tr>
                  <td>{{$key +1}}</td>
                  <td>{{$product->product_name}}</td>
                   <td><img src="{{URL::to($product->product_img)}}" height="70px" width="50px"></td>
                   
                   <td>{{$product->product_quantity}}</td> 
                   <td>{{$product->buying_price}}</td>
                    <td>{{$product->selling_price}}</td>
                  <td>
                      <a href="{{route('edit.product',['id' => $product->id]) }}" class="btn btn-sm btn-info">Edit</a>
                      
                      <a href="{{route('delete.product',['id' => $product->id])}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
          <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h3 class="tx-15 mg-b-10 tx-uppercase tx-inverse tx-bold">Add new Vehicle</h3>
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
              
              <form method="POST" action="{{route('store.product')}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-body pd-20 mg-20">
               <div class="form-group">
                    <label for="category">Product Name</label>
                    <input type="text" class="form-control" placeholder="Product Name" name="product_name">

                  </div>
                
                    <div class="form-group">
                  <label for="category">Product Image</label>
                 
                  <input type="file" id="file" class="form-control" name="product_img" onchange="readURL(this);">
                  <img src="#" id="img" alt="">
                  </div>
                  {{-- <img src="#" id="img" alt=""> --}}
                
                  <div class="form-group">
                    <label for="category">Quantity</label>
                    <input type="text" class="form-control" placeholder="Quantity" name="product_quantity">

                  </div>
                  <div class="form-group">
                    <label for="category">Buying Price</label>
                    <input type="text" class="form-control" placeholder="Buying Price" name="buying_price">

                  </div>
                   
                  <div class="form-group">
                    <label for="category">Selling Price</label>
                    <input type="text" class="form-control" placeholder="Selling Price" name="selling_price">
</div>
                  </div>
           
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
                 </form>
          </div><!-- modal-dialog -->
        </div><!-- modal -->


    
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
<script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
@endsection