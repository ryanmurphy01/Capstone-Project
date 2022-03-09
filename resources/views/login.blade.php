
<!DOCTYPE html>
<html lang="en">

{{-- import the bootstrap, as mentioned in that comment --}}
@extends('template')
{{-- marker to fill the contect yield section with whatever is put in here --}}
@section('content')

<head>

</head>

<body>

<section class="vh-100" style="background-color: #00693C;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-sm-12 col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-4 fs-1 text-center">Login</h3>

            <form action="" method="post">

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Password</label>
            </div>
            
        
              <p class="small d-md-flex justify-content-md-end"><a href="#!" class="text-black mb-2">Forgot password?</a></p>
           
              
            <div class="d-grid">
                <button type="button" class="btn btn-lg btn-primary mb-2">Login</button>
            </div>
           
              </form>
        

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

@endsection


</html>