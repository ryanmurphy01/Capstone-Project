@extends('navBarTemplate')
@section('content')


        <div class="col py-3 m-5">
        <div class="border border-dark rounded text-center bg-secondary" style="--bs-bg-opacity: .20; width: auto">
            <h1 class="mt-4 text-success">Request Availability</h1>

            <h2 class="col mt-4">Semester</h2>

        <div class="row">
            <h3 class="col mt-4">Semester Name here</h3>
            <h3 class="col mt-4">Semester Code here</h3>
        </div>

            {{-- TODO make this do something --}}
            <button type="button" class="my-4 btn btn-warning border-dark" style="width: 150px;">Send Email</button>
        </div>

        </div>
    </div>
</div>

@endsection
