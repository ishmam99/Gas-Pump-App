@extends('layouts.app')

@section('content')	
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Filling Station</a>
        <span class="breadcrumb-item active">Vehicle Section</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Show Vehicle Details</h5>
         
        </div>
    
        <div class="card pd-20 pd-sm-40">
            
            <h6 class="card-body-title">
          <a href="{{route('edit.vehicle',['id' => $vehicle->id]) }}" class="btn btn-info btn-sm pull-right">Update Vehicle Details</a></h6>
    <div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				{{-- <div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li><img src="{{URL::to($product->image_one)}}" height="80px;" width="auto"></li>
                        <br>
                        <br>
						<li ><img src="{{URL::to($product->image_two)}}" height="80px;" width="auto"></li>
                        <br>
                        <br>
						<li ><img src="{{URL::to($product->image_three)}}" height="80px;" width="auto"></li>
					</ul>
				</div> --}}

				

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="text-success">Category : </div>
                        <div class="text-primary">Subcategory : </div>
                        <div class="text-warning">Brand : </div>
                        <div class="font-weight-bold">Product Code : </div>
						<div class="text-info"><h3><strong></strong></h3></div>
						
						<div class="product_text"></div>
						<div class="order_info d-flex flex-row">
							
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									
										
									

									<!-- Product Color -->
									<ul class="product_color">
                                        <li>
                                            <span>Available Quantity : </span>
										
                                        </li>
										<li>
											<span>Color:  </span>
											
										</li>
                                        <li>
                                            <div class="product_price">Selling Price : $</div>
                                        </li>
                                        <li>
                                            <span>Size: </span>
                                        </li>
                                        
                                          
                                              <li>  <span>Discount Price: </span></li>
                                           

                                            <div class="row">

                                           
                                        <div class="col-lg-4">
											<span>Status 
                                                <span class="badge badge-success"> Active</span>
                                           
                                                <span class="badge badge-danger">Inctive</span>
                                          
                                          </span>
											
										</div>
										<div class="col-lg-4">
											<span>Main Slider 
                                                <span class="badge badge-success"> Active</span>
                                            
                                                <span class="badge badge-danger">Inctive</span>
                                          
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Mid Slider 
                                                <span class="badge badge-success"> Active</span>
                                          
                                                <span class="badge badge-danger">Inctive</span>
                                           
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Hot Deals  
                                                <span class="badge badge-success"> Active</span>
                                         
                                                <span class="badge badge-danger">Inctive</span>
                                           
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Best Rated  
                                                <span class="badge badge-success"> Active</span>
                                            
                                                <span class="badge badge-danger">Inctive</span>
                                            
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Hot New  
                                                <span class="badge badge-success"> Active</span>
                                           
                                                <span class="badge badge-danger">Inctive</span>
                                           
                                          </span>
											
										</div>
                                        <div class="col-lg-4">
											<span>Trending  
                                                <span class="badge badge-success"> Active</span>
                                          
                                                <span class="badge badge-danger">Inctive</span>
                                           
                                          </span>
											
										</div>
									 </div>
                                        </ul>

								</div>
                                </div>
                                
                                </div>

							
							
								
							
						
					</div>
				</div>

			</div>
		</div>
	</div>
        </div>    
</div>    
</div>
@endsection