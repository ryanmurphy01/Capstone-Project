@extends('template')
@section('content')

<h1>Course History</h1>
<input type="text" placeholder="Instructor or Course Code...">

<table>
    <tr>
      <th>Course Name</th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      {{-- send user from here to the specific hitory page when clicked on one of these --}}
      <td><a href="#">Ryan Murphy</a></td>
    </tr>
  </table>

@endsection
