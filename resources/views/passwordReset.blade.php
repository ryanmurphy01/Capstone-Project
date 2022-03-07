@extends('template')
@section('content')

{{-- temp styles --}}
<div class="container" style="height: 80vh">
    <div class="row" style="padding-top: 10vh">
        <div class="col-sm-4 col-sm-offset-4">
            {{-- TODO link this to the appropriate controller --}}
            <form class="w-50 h-50" action="sendResetLink" method="POST">
                @csrf
                <div class="form-group">
                    <label for="resetEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="resetEmail">
                </div>
                <button type="submit" class="btn btn-primary text-center">Reset</button>
            </form>
        </div>
    </div>
</div>

{{-- make sure to not forget the closing section tag --}}
@endsection
