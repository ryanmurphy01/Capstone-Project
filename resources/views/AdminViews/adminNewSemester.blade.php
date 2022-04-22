@extends('template')
@section('content')

<section class="vh-100" style="background-color: #00693C;">
<div class= "container-fluid">
    <div class="row flex-nowrap justify-content-center p-5">
        <div class="col-auto col-md-0 col-xl-0 px-sm-2 px-0">
            <div class="card p-5">
                <h1>New Semester Form</h1>

                <form method="post" action="{{route('semester.store')}}">
                @csrf
                    <br>

                    <h4>Semester Name<h4>
                    <select class="form-select form-select-lg " aria-label="Default select example" name="semesterName">
                        <option value='' disabled selected>Select Semester Name</option>
                        <option value='Fall'>Fall</option>
                        <option value='Winter'>Winter</option>
                        <option value='Summer'>Summer</option>

                    </select>

                    <!-- error field -->
                    <span class="text-danger">@error('semesterName'){{ $message }} @enderror</span>

                    <br>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="semesterYear" name="semesterYear" min="2000" placeholder="2022" value="2022">
                        <label for="semesterYear">Semester Year</label>

                        <!-- error field -->
                        <span class="text-danger">@error('semesterYear'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="semesterCode" name="semesterCode" placeholder="example" value="">
                        <label for="floatingInput">Semester Code</label>

                        <!-- error field -->
                        <span class="text-danger">@error('semesterCode'){{ $message }} @enderror</span>
                    </div>

                    <div class="modal-footer">
                    <a type="button" class="btn btn-secondary btn-lg" href="{{url()->previous()}}">Back</a>
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
