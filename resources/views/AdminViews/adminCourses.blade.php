@extends('navBarTemplate')
@section('content')


        <div class="col-8">
            <h1 class="pb-5 pt-5 display-3">{{ $programs->program_name }}</h1>
            @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-fail alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{ Session::get('fail') }}
            </div>
            @endif
            <input type="text" placeholder="Course Name or Code..." class="form-control form-control-lg">

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    Failed to add new Program please try again.
                </div>
            @endif

           


            <table class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Course Description</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->description }}</td>
                        <td>

                            <a class="btn btn border-dark" id="edit"  href="{{ route('courses.edit', $course->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                            <form style="display: inline-block" action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="button" class="btn btn-success float-end" style="width: 150px" data-bs-toggle="modal" data-bs-target="#userModal">
                Add Course
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Create Course</h1>
            </div>
            <div class="modal-body">

                {{-- TODO put the proper route in here when done route('courses.store') --}}
                <form method="post" action="{{ route('storeCourse', $programs->id) }}">
                @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="courseName" name="courseName" placeholder="example">
                        <label for="floatingInput">Course Name</label>

                        <!-- error field -->
                        <span class="text-danger">@error('courseName'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="example">
                        <label for="floatingInput">Course Code</label>

                        <!-- error field -->
                        <span class="text-danger">@error('courseCode'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="description" name="description" placeholder="example">
                        <label for="floatingInput">Description</label>

                        <!-- error field -->
                        <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="creditHours" name="creditHours" placeholder="1">
                        <label for="floatingInput">Credit Hours</label>

                        <!-- error field -->
                        <span class="text-danger">@error('creditHours'){{ $message }} @enderror</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
