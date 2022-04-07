@extends('template')
@section('content')

{{-- temp styles --}}
<section class="vh-100" style="background-color: #00693C;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-sm-12 col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong">
            <div class="card-body p-5">
  
            <h3 class="mb-4 fs-1 text-center">Forgot Password</h3>
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
  
            <form method="post" action="{{ route('forgot.link') }}" >
  
                  @csrf

                  <p>Enter your email address below to send a reset password link</p>
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control"  name="personal_email" placeholder="name@example.com" value="{{ old('personal_email')}}">
                      <label for="floatingInput">Email</label>
  
                      <!--Error message-->
                      <span class="text-danger">@error('personal_email'){{ $message }}@enderror</span>
                  </div>
   
                  <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-primary mb-2">Send Reset Link</button>
                  </div>
  
             </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
