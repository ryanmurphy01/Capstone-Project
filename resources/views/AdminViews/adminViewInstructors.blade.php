@extends('template')
@section('content')

<h1>Instructors</h1>
<input type="text" placeholder="Name...">

<table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      {{-- empty placeholder that may be helpful for formatting (the table heading)) --}}
      <th></th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      <td>Alfreds</td>
      <td>Futterkiste</td>
      <td>AFutterkiste@example.com</td>
      <td>5555555555</td>
      <td>
          <button type="button">flag</button>
          <button type="button">edit</button>
          {{-- TODO link this to actually do something --}}
          <a href="#">Deactivate</a>
      </td>
    </tr>
  </table>

  {{-- the thing in the url is the route name of the destination page, see web.php --}}
  <button onclick="document.location='{{ url('deactivated') }}'">Deactivated Users</button>
  <button onclick="document.location='{{ url('unresponsive') }}'">Unresponsive Users</button>

  {{-- could make an invisible form which appears when this button is clicked --}}
  <button type="button">Add User</button>

@endsection
