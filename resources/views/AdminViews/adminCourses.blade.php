@extends('template')
@section('content')

<h1>Program Title Here</h1>
<input type="text" placeholder="Course Name or Code...">

<table>
    <tr>
      <th>Course Name</th>
      <th>Course Code</th>
      {{-- empty placeholder that may be helpful for formatting (heading) --}}
      <th></th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      <td>HTML and CSS</td>
      <td>WEB110</td>
      <td>
        {{-- use these to trigger a popup or run a function --}}
        <button type="button">flag</button>
        <button type="button">edit</button>
      </td>
    </tr>
  </table>

  <button type="button">Add Course</button>

@endsection
