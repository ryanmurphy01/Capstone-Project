@extends('navBarTemplate')
@section('content')
{{-- this is the page to show what the teacher has taught, the other history is the one for picking the instructor --}}


        <div class="col-8">
            {{-- TODO, this part causes a crash when leaving the page using the navbar. something about the account
            object not existing. We can either disable the navbar here or make a button that takes them back instead --}}
            <h1 class="pb-5 pt-5 display-3">Course History - {{ $accounts->first_name }} {{ $accounts->last_name }}</h1>
            <input type="text" placeholder="Course Name or Code..." class="form-control form-control-lg">

            <table class="table table-hover table-striped mx-auto text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- again, use a foreach to go through db once it's setup --}}
                    <tr>
                        <td>HTML and CSS</td>
                        <td>Course Code</td>
                        {{-- replace with svg at some point --}}
                        <td><img src="#" alt="status icon"></td>
                        <td>
                            <button type="button" class="btn btn border-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
