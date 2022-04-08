@extends('navBarTemplate')
@section('content')



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


            <input type="text" placeholder="Program Name or Code..." class="form-control form-control-lg">

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
