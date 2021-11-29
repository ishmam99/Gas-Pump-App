@extends('layouts.app')
@section('content')
 <div class="sl-mainpanel">
      
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Form Layouts</h5>
          <p>Forms are used to collect user information with different element types of input, select, checkboxes, radios and more.</p>
        </div><!-- sl-page-title -->

        <div class="card pd-50 pd-sm-70">
          <h6 class="card-body-title">Top Label Layout</h6>
          <p class="mg-b-20 mg-sm-b-30">A form with a label on top of each form control.</p>

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
               <div class="form-group mg-b-10-force">
                 <form method="POST" action="{{route('create.sales')}}">
                  @csrf
                  <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Select Company" id="customer" name="company_id">
                    <option value="">Select Company</option>
                    @foreach ($company as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                   
                    
                  </select>
               </div>
                </div>
            
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Vehicle Number: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Vehciles" id="customer2" name="vehicle">
                    
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                   <label class="form-control-label">Select Product : <span class="tx-danger">*</span></label>
                
                  <select class="form-control select2" id="product"   name="product"  data-placeholder="Select Product">
                    <option label="Select Prodcut"></option>
                    @foreach ($product as $item)                        
                    <option value="{{$item->selling_price}}">{{$item->product_name}} per litre {{$item->selling_price}}</option>  @endforeach
                    <input type="text" hidden name="product_id" value="{{$item->id}}">
                    
                  </select>

    
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" id="quantity"  name="quantity" required  placeholder="Enter Fule Quantity" onchange="singleSelectChangeText();">
                       </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Paid Amount: <span class="tx-danger">*</span></label>
                 <input class="form-control" type="text" name="paid_amount" id="paid_amount" required>
                </div>
              </div><!-- col-4 -->
             <div class="col-lg-5">
                 <div class="row">
                   <div class="col-lg-4">
                     
                         <div class="form-group">
                          <label class="form-control-label" for="Total" >Total</label>
                          <input class="form-control" type="text" name="total_amount" id="total" readonly>
                       </div>
                   </div>
                    <div class="col-lg-4">
                     
                         <div class="form-group">
                          <label class="form-control-label" for="Total">Due</label>
                         
                          <input class="form-control" type="text" name="due_amount" id="due" readonly>
                       </div>
                   </div>
                   </div>
               </div>
              
               </div>
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
            </form>
          </div><!-- form-layout -->
        </div><!-- card -->
        </div>
      </div>


   
    <script>
        function singleSelectChangeText() {
        //Getting Value
        
        var quantity=document.getElementById("quantity").value;
        var selObj = document.getElementById("product");
        var selValue = selObj.options[selObj.selectedIndex].value*quantity;
        
        //Setting Value
        document.getElementById("total").value = selValue;
    }
    

    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
     <script>
      $(document).ready(function(){
        $('select[name="company_id"]').on('change',function(){
          var company_id = $(this).val();
          if(company_id)
          {
            $.ajax({
              url:"{{url('/get/vehicle/')}}/"+company_id,
              type:"GET",
              dataType:"json",
              success:function(data){
                var d=$('select[name="vehicle"]').empty();
                $.each(data, function(key, value){
                  $('select[name="vehicle"]').append('<option value="'+value.id+'">'+value.vehicle_number+'</option>');
                });
              },
            });
          }else{
            alert('danger');
          }
        });
         $("#paid_amount").on("change",function(){
        //Getting Value
        var total=$("#total").val();
        var due =total- $("#paid_amount").val();
        //Setting Value
        $("#due").val(due);
    });
      });
    </script>
   
@endsection 