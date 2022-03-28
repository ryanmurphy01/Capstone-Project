@extends('navBarTemplate')
@section('content')


        <div class="col-8">
            <h1 class="pb-5 pt-5 display-3">Deactivated Instructors</h1>
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
            <input type="text" placeholder="Name..." class="mb-4 w-100 p-1">

            <table class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        {{-- empty placeholder that may be helpful for formatting --}}
                        <th></th>
                    </tr>
                </thead>
                {{-- again, use a foreach to go through db once it's setup --}}
                <tbody>
                    @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->first_name}}</td>
                        <td>{{ $account->last_name}}</td>
                        <td>{{ $account->personal_email}}</td>
                        <td>{{ $account->contact_number}}</td>
                        <td>
                            <button type="button" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                </svg>
                            </button>
                            <button type="button" class="btn btn border-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </button>
                            <form style="display: inline-block" action="{{ route('deactivate.activate',$account->id) }}" method="POST">

                                <button type="submit" class="btn btn-success">reactivate</button>
                                @csrf
                                @method('PUT')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
