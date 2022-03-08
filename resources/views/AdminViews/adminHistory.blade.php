@extends('template')
@section('content')

{{-- bootstrap nav bar --}}
{{-- additional styles, height to make it fill the page, border to make it visible, and position so it doesn't move the other stuff --}}
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh; border-right: 1px solid black; position: fixed">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        {{-- tag the current page with the active tag so it shows which is selected --}}
        <a href="instructors" class="nav-link link-dark" aria-current="page">
          {{-- this is where the icons are meant to go, put them in once we have them --}}
          {{-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg> --}}
          {{-- also add image alt tags once we have them, messes with the code if i do it now --}}
          <img src="#" width="16" height="16"/>
          View Instructors
        </a>
      </li>
      <li>
        <a href="availability" class="nav-link link-dark">
          <img src="#" width="16" height="16"/>
          Instructor Availability
        </a>
      </li>
      <li>
        <a href="programs" class="nav-link link-dark">
          <img src="#" width="16" height="16"/>
          {{-- renamed this one to sound better --}}
          Programs and Courses
        </a>
      </li>
      <li>
        <a href="history" class="nav-link active">
          <img src="#" width="16" height="16"/>
          {{-- renamed this one to sound better --}}
          Instructor History
        </a>
      </li>
      <li>
        <a href="semester" class="nav-link link-dark">
          <img src="#" width="16" height="16"/>
          Semester
        </a>
      </li>
      <li>
        <a href="email" class="nav-link link-dark">
          <img src="#" width="16" height="16"/>
          Request Availability
        </a>
      </li>
      <li>
        <a href="requests" class="nav-link link-dark">
          <img src="#" width="16" height="16"/>
          Course Requests
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        {{-- <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li> --}}
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

{{-- margin to compensate for navbar, exactly the same width so it doesn't cause issues with padding and stuff --}}
<div style="margin-left: 280px">
    <h1>Course History</h1>
    <input type="text" placeholder="Instructor or Course Code...">

    <table>
        <tr>
        <th>Course Name</th>
        </tr>
        {{-- again, use a foreach to go through db once it's setup --}}
        <tr>
        {{-- send user from here to the specific history page when clicked on one of these --}}
        <td><a href="#">Ryan Murphy</a></td>
        </tr>
    </table>
</div>

@endsection
