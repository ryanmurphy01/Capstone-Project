@extends('template')
@section('content')

<h1>Course History - Instructor Name Here</h1>
<input type="text" placeholder="Course Name or Code...">

<table>
    <tr>
      <th>Course Name</th>
      <th>Course Code</th>
      <th>Status</th>
      <th></th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      {{-- send user from here to the specific hitory page when clicked on one of these --}}
      <td>HTML and CSS</td>
      <td>Course Code</td>
      {{-- put the right image here once we have it --}}
      <td><img src="#" alt="status icon"></td>
      <td><button type="button">edit</button></td>
    </tr>
  </table>

@endsection
