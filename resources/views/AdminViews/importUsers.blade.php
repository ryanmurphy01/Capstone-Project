@extends('template')
@section('content')

<div class="card-header"> Import Users </div>
<div class="card-body">
    @if (session('satus'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form action='{{route('import.excel')}}' method="post" enctype="multipart/form-data">
        @csrf

        <div class="form group">
            <input type="file" name="file"/>
            <a type="button" class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
            <button type="submit" class="btn btn-primary">Import</button>
            
        </div>
    </form>

</div>


@endsection