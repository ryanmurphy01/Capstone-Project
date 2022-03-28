@extends('navBarTemplate')
@section('content')



        <div class="col-8">
            <h1 class="pb-5 pt-5 display-3">Instructors</h1>
            
            @if($errors->any())
            <script>
                    $(document).ready(function(){
                        $('#userModal').modal("show");
                    });
                </script>
                @endif
            
            {{-- When modal form fails tell user --}}
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    Failed to add new User please try again.
                </div>
            @endif 
            
            {{-- If Sql works tell user if not display error--}}
            @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    @if(Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ Session::get('fail') }}
                    </div>
                    @endif
            <input type="text" class="form-control form-control-lg" placeholder="Search...">

            <table class="table table-hover table-striped">

                <thead class="thead-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                    <tr>
                        <td class="firstname">{{ $account->first_name}}</td>
                        <td>{{ $account->last_name}}</td>
                        <td>{{ $account->personal_email}}</td>
                        <td>{{ $account->contact_number}}</td>
                        <td>
                            <button type="button" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                </svg>
                            </button>
                            <a type="button" class="btn btn border-dark" id="edit"  href="{{route('instructors.edit', $account->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>

                            <form style="display: inline-block" action="{{ route('deactivate.activate',$account->id) }}" method="POST">

                                <button type="submit" class="btn btn-danger">Deactivate</button>
                                @csrf
                                @method('PUT')
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <button type="button" class="btn btn-danger" onclick="document.location='{{ url('deactivated') }}'">Deactivated Users</button>
            <button type="button" class="btn btn-warning" onclick="document.location='{{ url('unresponsive') }}'">Unresponsive Users</button>

            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#userModal">Add User</button>

         
            


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true" name="userModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title ">Create Instructor</h1>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('instructors.store') }}">
                @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="name@example.com" value="{{ old('firstname')}}">
                        <label for="floatingInput">First Name</label>

                        <!-- error field -->
                        <span class="text-danger">@error('firstname'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="name@example.com" value="{{ old('lastname')}}">
                        <label for="floatingInput">Last Name</label>

                        <!-- error field -->
                        <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="personalemail" name="personalemail" placeholder="name@example.com" value="{{ old('personalemail')}}">
                        <label for="email">Personal Email</label>

                        <!-- error field -->
                        <span class="text-danger">@error('personalemail'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="collegeEmail" name="collegeemail" placeholder="name@example.com" value="{{ old('collegeemail')}}">
                        <label for="email">College Email</label>

                        <!-- error field -->
                        <span class="text-danger">@error('collegeemail'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="name@example.com" >
                        <label for="password">Password</label>

                        <!-- error field -->
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="name@example.com" value="{{ old('phone')}}">
                        <label for="number">Phone Number</label>

                        <!-- error field -->
                        <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                    </div>

                    <select class="form-select form-select-lg " aria-label="Default select example" name="accounttype">
                        <option value='' disabled selected>Select Account Type</option>
                        @foreach ($accountTypes as $type)
                        <option value='{{$type->id}}'>{{ $type->account_type }}</option>
                        @endforeach
                    </select>

                     <!-- error field -->
                     <span class="text-danger">@error('accounttype'){{ $message }} @enderror</span>

                     <br>

                  

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                    

                </form>
               
               
            </div>
        </div>
    </div>
</div>

@endsection
