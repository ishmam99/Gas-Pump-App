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
                   <th class="wd-15p">Vehicle Number</th>
                   <th class="wd-15p">Owener name</th>
                  <th class="wd-15p">Company name</th>
                  <th class="wd-20p">Phone</th>
                   <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($vehicles as $key=>$vehicle)
                    
             
                <tr>
                  <td>{{$key +1}}</td>
                   <td><a href="{{route('show.vehicle',['id'=> $vehicle->id])}}">{{$vehicle->vehicle_number}}</a></td>
                  <td>{{$vehicle->owener_name}}</td>
                   <td>{{$vehicle->name}}</td> 
                   <td>{{$vehicle->owener_phone}}</td>
                  <td>
                      <a href="{{route('edit.vehicle',['id' => $vehicle->id]) }}" class="btn btn-sm btn-info">Edit</a>
                      
                      <a href="{{route('delete.vehicle',['id' => $vehicle->id])}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
              
              <form method="POST" action="{{route('store.vehicle')}}">
                @csrf
              <div class="modal-body pd-20 mg-20">
               <div class="form-group">
                    <label for="category">Vehicle Number</label>
                    <input type="text" class="form-control" placeholder="Vehcile Number" name="vehicle_number">

                  </div>
                  <div class="form-group">
                    <label for="category">Company Name</label>
                    <select class="form-control select2" data-placeholder="Choose Category" name="company_id">
                    @foreach ($company as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                   
                    
                  </select>

                  </div>
                  <div class="form-group">
                    <label for="category">Owener Name</label>
                    <input type="text" class="form-control" placeholder="Category Name" name="owener_name">

                  </div>
                  <div class="form-group">
                    <label for="category">Owener Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="owener_phone">

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


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h3 >Add new Vehicle sa  d   g  j d a e a e w Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</h3>
                
      </div>
      
    </div>
  </div>
</div>
       

@endsection