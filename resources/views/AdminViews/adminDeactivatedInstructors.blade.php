@extends('template')
@section('content')

<h1>Deactivated Instructors</h1>
<input type="text" placeholder="Name...">

<table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      {{-- empty placeholder that may be helpful for formatting --}}
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
          <a href="#">Reactivate</a>
      </td>
    </tr>
  </table>

@endsection
