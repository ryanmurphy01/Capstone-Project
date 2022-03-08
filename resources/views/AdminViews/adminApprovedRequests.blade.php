@extends('template')
@section('content')

<h1>Approved Instructors</h1>

<table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      {{-- empty header for format --}}
      <th></th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      <td>Philip Rosen</td>
      <td>HTML and CSS</td>
      <td>WEB110</td>
      {{-- make the image an onclick once we get into controllers and stuff --}}
      <td>
        <svg height="30" width="30">
            <circle cx="15" cy="15" r="10" stroke="black" stroke-width="3" fill="green" />
        </svg>
      </td>
    </tr>
</table>

{{-- not really sure if this is to update all records or bring up the editing popup, clarify next time we talk --}}
<button type="button">Update</button>

@endsection
