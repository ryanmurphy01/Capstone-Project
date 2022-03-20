{{-- import the bootstrap, as mentioned in that comment --}}
@extends('template')
{{-- marker to fill the contect yield section with whatever is put in here --}}
@section('content')

{{-- temp styles --}}
<div class="container" style="height: 80vh">
    <div class="row" style="padding-top: 10vh">
        <div class="col-sm-4 col-sm-offset-4">
            {{-- TODO link this to the appropriate controller --}}
            <form class="w-50 h-50" action="setPassword" method="POST">
                {{-- needed for security apparently --}}
                @csrf
                <div class="form-group">
                    <label for="setPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="setPassword" placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-primary text-center">Set</button>
            </form>
        </div>
    </div>
</div>

{{-- make sure to not forget the closing section tag --}}
@endsection


