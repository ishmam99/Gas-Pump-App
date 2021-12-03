<?php 
$dashboard = null;
$pos= null;
$company =null;
$vehicle = null;
$product =null;
$cashier =null;

if($bg==1){
  $dashboard = "active";
}
elseif ($bg==2) {
  $pos="active";
}
elseif ($bg==3) {
  $company="active";

}
elseif ($bg==4) {
  $vehicle = "active";
}
elseif ($bg==5) {
  $product="active";
}
elseif ($bg==6) {
  $cashier="active";
}
   ?>
    
    
    <!-- ########## START: LEFT PANEL ########## -->

    <div class="sl-logo"><a href="{{route('home')}}"><i class="fa fa-gas-pump"></i>Filling Station</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        @if (Auth::user()->role_id==1)
             <a href="{{route('admin')}}" class="sl-menu-link {{$dashboard}}" >
        @else
             <a href="{{route('user')}}" class="sl-menu-link {{$dashboard}}" >
        @endif
       
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{route('sales')}}" class="sl-menu-link {{$pos}}" >
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-android-cart tx-20"></i>
            <span class="menu-item-label">POS</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{route('company')}}" class="sl-menu-link {{$company}}">
          <div class="sl-menu-item">
           <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Company List</span>
           
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
         {{-- <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
          <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
          <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>   --}}
        
        <a href="{{route('vehicle')}}" class="sl-menu-link {{$vehicle}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-android-car tx-24"></i>
            <span class="menu-item-label">Vehicles</span>
            
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
     
        <a href="{{route('product')}}" class="sl-menu-link {{$product}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Product</span>
          
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{route('cashier')}}" class="sl-menu-link {{$cashier}}">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-person tx-24"></i>
            <span class="menu-item-label"> Cashier List</span>
          
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
