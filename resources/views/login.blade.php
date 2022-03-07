{{-- import the bootstrap, as mentioned in that comment --}}
@extends('template')
{{-- marker to fill the contect yield section with whatever is put in here --}}
@section('content')

{{-- temp styles --}}
<div class="container" style="height: 80vh">
    <div class="row" style="padding-top: 10vh">
        <div class="col-sm-4 col-sm-offset-4">
            {{-- TODO link to proper constroller once ready --}}
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="loginEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="loginEmail">
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="loginPassword">
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
        </div>
    </div>
</div>

@endsection
