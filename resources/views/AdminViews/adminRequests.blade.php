@extends('template')
@section('content')

<h1>Course Requests</h1>

{{-- the key for the little circles --}}
<div>
    <div>
        <h3>Approve</h3>
        <img src="#" alt="green circle">
    </div>
    <div>
        <h3>Pending</h3>
        <img src="#" alt="orange circle">
    </div>
    <div>
        <h3>Deny</h3>
        <img src="#" alt="red circle">
    </div>
</div>

<table>
    <tr>
      <th>Instructor Name</th>
      <th>Course Name</th>
      <th>Course Code</th>
      <th>Status</th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      <td>Philip Rosen</td>
      <td>HTML and CSS</td>
      <td>WEB110</td>
      {{-- make the image an onclick once we get into controllers and stuff --}}
      <td><img src="#" alt="status icon"></td>
    </tr>
</table>

{{-- the thing in the url is the route name of the destination page, see web.php --}}
<button onclick="document.location='{{ url('approvedRequests') }}'">Approved</button>
<button onclick="document.location='{{ url('deniedRequests') }}'">Denied</button>

@endsection
