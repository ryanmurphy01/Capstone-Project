@extends('template')
@section('content')

<section class="vh-100" style="background-color: #00693C;">
<div class= "container-fluid">
    <div class="row flex-nowrap justify-content-center p-5">
        <div class="col-auto col-md-0 col-xl-0 px-sm-2 px-0">
            <div class="card p-5">
                <h1>Edit {{$program->program_name}} Program</h1>

                <form method="post" action="{{ route('programs.update', $program->id) }}">
                @csrf
                @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="programCode" name="programCode" placeholder="example" value="{{ $program->program_code }}">
                        <label for="floatingInput">Program Code</label>

                        <!-- error field -->
                        <span class="text-danger">@error('programCode'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="programName" name="programName" placeholder="example" value="{{ $program->program_name }}">
                        <label for="floatingInput">Program Name</label>

                        <!-- error field -->
                        <span class="text-danger">@error('programName'){{ $message }} @enderror</span>
                    </div>

                    <div class="modal-footer">
                    <a type="button" class="btn btn-secondary btn-lg" href="{{ url()->previous() }}">Back</a>
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
