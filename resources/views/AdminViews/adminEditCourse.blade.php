@extends('template')
@section('content')

<section class="vh-100" style="background-color: #00693C;">
<div class= "container-fluid">
    <div class="row flex-nowrap justify-content-center p-5">
        <div class="col-auto col-md-0 col-xl-0 px-sm-2 px-0">
            <div class="card p-5">
                <h1>Edit {{$course->course_name}} course</h1>

                <form method="post" action="{{ route('courses.update', $course->id) }}">
                @csrf
                @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="courseName" name="courseName" placeholder="example" value="{{ $course->course_name }}">
                        <label for="floatingInput">Course Name</label>

                        <!-- error field -->
                        <span class="text-danger">@error('courseName'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="example" value="{{ $course->course_code }}">
                        <label for="floatingInput">Course Code</label>

                        <!-- error field -->
                        <span class="text-danger">@error('courseCode'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="textarea" class="form-control" id="description" name="description" placeholder="example" value="{{ $course->description }}">
                        <label for="floatingInput">Description</label>

                        <!-- error field -->
                        <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="creditHours" name="creditHours" placeholder="1" value="{{ $course->credit_hours }}">
                        <label for="floatingInput">Credit Hours</label>

                        <!-- error field -->
                        <span class="text-danger">@error('creditHours'){{ $message }} @enderror</span>
                    </div>

                    <div class="modal-footer">
                        {{-- technically works but might want to change if there's a better way --}}
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
