@extends('template')
@section('content')

{{-- bootstrap nav bar --}}
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-0 col-xl-0 px-sm-2 px-0">
            {{-- extra style, border to make the bar actually visible lol --}}
            <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-2 min-vh-100" style="border-right: 1px solid black;">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto link-dark text-decoration-none justify-center">
                    <span class="d-none d-sm-inline text-center" style="font-size: 18pt;">Instructor Panel</span>
                </a>
                {{-- make both of these max width so the active box fills all the space, also add a touch of margin so it doesn't touch the edge --}}
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu" style="width: 100%; margin-right: 10px">                    <li class="nav-item" style="width: 100%">
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="welcome" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Welcome</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="schedule" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Availability</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="courses" class="nav-link align-middle px-0 link-dark active">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Courses</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4" style="border-top: 1px solid black; width: 100%; padding-top: 20px">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- insert profile pic/icon here here --}}
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Instructor Name Here</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Sign Out</a></li>
                        {{-- <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
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
                            <button type="button" class="btn btn-danger float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
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
