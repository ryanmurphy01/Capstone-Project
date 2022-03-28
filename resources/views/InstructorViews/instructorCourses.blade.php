@extends('navBarTemplate')
@section('content')


        <div class="col-8">
            <h1 class="pb-5 pt-5 display-3">Select Your Courses</h1>

            <div class="row">
                <div class="col-sm">
                    <label class="pb-2 pt-2 display-6" for="selectPrograms">Program</label>
                    <select class="form-select form-select-lg" name="selectPrograms" id="selectPrograms">
                        <option value='' disabled selected>Select Program</option>
                        @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                        @endforeach
                    </select>

                    <label class="pb-2 pt-2 display-6" for="selectCourses">Courses</label>
                    <select class="form-select form-select-lg" name="selectCourses" id="selectCourses">
                        {{-- again some kind of foreach, probably with a condition checking for the matching program above --}}
                        {{-- also an 'on hover' here or something that checks program for updated value before showing coruses --}}
                        <option value='' disabled selected>Select Course</option>
                        {{-- <option value="MAD201">Java Programming I</option> --}}
                    </select>

                    {{-- might need to make this whole section into a form, or have some other way to capture the course inputs --}}
                    {{-- also buttons may need ids --}}
                    <button style="margin-top: 10px" type="button" class="pb-2 pt-2 btn btn-success">Add to Selection</button>
                </div>

                <div class="col-sm">
                    <h3 class="pb-2 pt-2 display-6">Course Description</h3>
                    <p>
                        This course introduces students to the fundamental programming concepts using the Java language.
                        Students will learn the proper use of control structures such as selection looping and modularization.
                        They will also become proficient at using the basic Java syntax to implement program designs.
                        Students will learn how a language such as Java handles various primitive data types and how standard classes
                        are used to support the storage and manipulation of more complex data. Students will be introduced to "Encapsulation"
                        the first concept of Object Oriented Programming (OOP).
                    </p>
                </div>
                <div class="col-sm">
                    <h3 class="pb-2 pt-2 display-6">Selected Courses</h3>
                    {{-- table to hold the selected courses --}}
                    <table class="table table-hover table-striped">
                        {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                        <td>Java Programming I - MAD201
                            <button type="button" class="btn btn border-dark float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </button>
                        </td>
                    </table>
                </div>
            </div>
            <button type="button" class="btn btn-primary float-end">Request These Courses</button>
        </div>
    </div>
</div>

@endsection
