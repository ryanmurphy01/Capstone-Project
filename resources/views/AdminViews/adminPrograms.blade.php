@extends('template')
@section('content')

{{-- bootstrap nav bar --}}
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-0 col-xl-0 px-sm-2 px-0">
            {{-- extra style, border to make the bar actually visible lol --}}
            <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-2 min-vh-100" style="border-right: 1px solid black;">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto link-dark text-decoration-none justify-center">
                    <span class="d-none d-sm-inline text-center" style="font-size: 18pt;">Admin Panel</span>
                </a>
                {{-- make both of these max width so the active box fills all the space, also add a touch of margin so it doesn't touch the edge --}}
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu" style="width: 100%; margin-right: 10px">                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="instructors" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">View Instructors</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="availability" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Instructor Availability</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%;">
                        {{-- link goes here --}}
                        <a href="programs" class="nav-link align-middle px-0 link-dark active">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Programs and Courses</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="history" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Instructor History</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="semester" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Semester</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="email" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"/>
                                <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Request Availability</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="requests" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-patch-question-fill" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Course Requests</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4" style="border-top: 1px solid black; width: 100%; padding-top: 20px">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- insert profile pic/icon here here --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        {{-- <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-8">
            <h1 class="pb-5 pt-5 display-3">Programs</h1>

            @if($errors->any())
            <script>
                    $(document).ready(function(){
                        $('#programModal').modal("show");
                    });
                </script>
                @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    Failed to add new Program please try again.
                </div>
            @endif

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

            {{-- search bar --}}
            <form action="{{ route('programs.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="aProgramSearch" id="aProgramSearch" placeholder="Search..." class="form-control form-control-lg">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </div>
            </form>

            <table class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Program Name</th>
                        <th>Program Code</th>
                        {{-- empty placeholder that may be helpful for formatting (heading) --}}
                        <th></th>
                    </tr>
                </thead>
                {{-- again, use a foreach to go through db once it's setup --}}
                <tbody>
                    @foreach ($programs as $program)
                    <tr>
                        <td><a href="courses/{{ $program->id }}" class="link-dark" style="font-size: 13pt">{{ $program->program_name }}</a></td>
                        {{-- <td>{{ $program->program_name }}</td> --}}
                        <td>{{ $program->program_code }}</td>
                        <td>
                            <a class="btn btn border-dark" id="edit"  href="{{route('programs.edit', $program->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                            <form style="display: inline-block" action="{{ route('programs.destroy',$program->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $programs->links() }}

            <button type="button" class="btn btn-success float-end" style="width: 150px" data-bs-toggle="modal" data-bs-target="#programModal">Add Program</button>
        </div>
    </div>
</div>

<div class="modal fade" id="programModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Create Program</h1>
            </div>
            <div class="modal-body">

                {{-- TODO put the proper route in here when done --}}
                <form method="post" action="{{ route('programs.store') }}">
                @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="programCode" name="programCode" placeholder="example">
                        <label for="floatingInput">Program Code</label>

                        <!-- error field -->
                        <span class="text-danger">@error('programCode'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="programName" name="programName" placeholder="example">
                        <label for="floatingInput">Program Name</label>

                        <!-- error field -->
                        <span class="text-danger">@error('programName'){{ $message }} @enderror</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Program</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
