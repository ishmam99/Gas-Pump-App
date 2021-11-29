<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				
			</div>
           
               
           
           
			<div class="card-body">
                 <form method="POST" action="{{ route('login') }}">
                        @csrf
                        

                       <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                       
                       </div>
                      <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        

                        <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>

                    </form>
				
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Filling Station App
				</div>
				
			</div>
             
		</div>
	</div>
</div>
</body>
</html>


{{--



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-login mx-auto text-center bg-dark">
                <div class="card-header mx-auto bg-dark">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        

                       <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                       
                       </div>
                      <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        

                        <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                   

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                           
                             @if (Route::has('login'))
               
                    @auth
                       <div class="card-body"> 
                          <button class="btn btn-primary" style="background-color:  #2d98b3;padding:10px;  border: 5px solid rgb(11, 160, 147); border-radius:10px;margin: 10;">  
                        <a href="{{ url('/home') }}" ><h3>Home</h3></a></button>  @if (Auth::check()&& Auth::user()->role_id==1)
                           @if (Route::has('register'))
                            <button class="btn btn-primary" style="background-color:  #2d98b3;padding:10px;  border: 5px solid rgb(11, 160, 147); border-radius:10px;margin: 10;">   <a href="{{ route('register') }}" ><h3>Register</h3></a></button>
                        @endif
                       @endif </div>
                    @else
                      <button class="btn btn-primary" style="background-color:  #2d98b3;padding:10px;  border: 5px solid rgb(11, 160, 147); border-radius:10px;margin: 10;">  <a href="{{ route('login') }}" ><h3>Log in</h3></a></button>

                    @endauth
               
            @endif
                        </div>
                    </div>

                    
                </div>
            </div>
        {{-- </div>   </body>
</html> --}}
