{{-- import the bootstrap, as mentioned in that comment --}}
@extends('template')
{{-- marker to fill the contect yield section with whatever is put in here --}}
@section('content')

<section class="vh-100" style="background-color: #00693C;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-sm-12 col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong">
            <div class="card-body p-5">
  
            <h3 class="mb-4 fs-1 text-center">Reset Password</h3>
  
            <form method="post" action="{{ route('reset.password') }}" >
  
                @if(Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
                @endif
  
                  @csrf

                  <input type="hidden" name="token" value="{{ $token }}">

                  <input type="hidden" class="form-control"  name="personal_email" placeholder="" value="{{$email ?? old ('email')}}">

                  <div class="form-floating mb-3">
                      <input type="password" class="form-control"  name="password" placeholder="" value="">
                      <label for="floatingInput">Password</label>
  
                      <!--Error message-->
                      <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                  </div>
   
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control"  name="password_confirmation" placeholder="" value="">
                    <label for="floatingInput">Confirm Password</label>

                    <!--Error message-->
                    <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                </div>

                  <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-primary mb-2">Reset Password</button>
                  </div>
  
             </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
{{-- make sure to not forget the closing section tag --}}
@endsection


