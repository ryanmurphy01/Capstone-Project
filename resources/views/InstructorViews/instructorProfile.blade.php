@extends('template')
@section('content')

<section class="vh-100" style="background-color: #00693C;">
    <div class= "container-fluid">
        <div class="row flex-nowrap justify-content-center p-5">
            <div class="col-auto col-md-0 col-xl-0 px-sm-2 px-0">
            <div class="card p-5">
    
            <h1>{{$account->first_name}} {{$account->last_name}} Profile</h1>
    
            {{-- these will redirect to different pages depending on where the edit was triggered from --}}
            @if ($account->status_id == 1)
                <form method="post" action="{{ route('instructors.update', $account->id) }}">
            @elseif($account->status_id == 2)
                <form method="post" action="{{ route('deactivated.update', $account->id) }}">
            @else
                <form method="post" action="{{ route('instructors.update', $account->id) }}">
            @endif
            {{-- if there's another status for unresponsive, adding it will be easy, otherwise we can go back to this ternery --}}
            {{-- <form method="post" action="{{ $account->status_id == 1 ? route('instructors.update', $account->id) : route('deactivated.update', $account->id) }}"> --}}
                @csrf
                @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="name@example.com" value="{{$account->first_name}}" >
                        <label for="floatingInput">First Name</label>
    
                        <!-- error field -->
                        <span class="text-danger">@error('firstname'){{ $message }} @enderror</span>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="name@example.com" value="{{$account->last_name}}">
                        <label for="floatingInput">Last Name</label>
    
                        <!-- error field -->
                        <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
                    </div>
    
                    {{-- new field for employee ID when adding users --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{$account->employee_id}}">
                        <label for="floatingInput">Employee ID</label>
    
                        <!-- error field -->
                        <span class="text-danger">@error('employee_id'){{ $message }} @enderror</span>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="personalemail" name="personalemail" placeholder="name@example.com" value="{{$account->personal_email}}">
                        <label for="email">Personal Email</label>
    
                        <!-- error field -->
                        <span class="text-danger">@error('personalemail'){{ $message }} @enderror</span>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="collegeEmail" name="collegeemail" placeholder="name@example.com" value="{{$account->school_email}}">
                        <label for="email">College Email</label>
    
                        <!-- error field -->
                        <span class="text-danger">@error('collegeemail'){{ $message }} @enderror</span>
                    </div>
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="name@example.com" value="{{$account->contact_number}}">
                        <label for="number">Phone Number</label>
    
                        <!-- error field -->
                        <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                    </div>

                    <br>
    
    

                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
    
    
                </form>
    
            </div>
            </div>
        </div>
    </div>
    </section>



@endsection