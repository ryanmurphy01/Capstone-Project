@extends('template')
@section('content')

<h1>Programs</h1>
<input type="text" placeholder="Program Name or Code...">

<table>
    <tr>
      <th>Program Name</th>
      <th>Program Code</th>
      {{-- empty placeholder that may be helpful for formatting (heading) --}}
      <th></th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      <td>Mobile Applications Development</td>
      <td>B990</td>
      <td>
        {{-- use these to trigger a popup or run a function --}}
        <button type="button">flag</button>
        <button type="button">edit</button>
      </td>
    </tr>
  </table>

  <button type="button">Add Program</button>

@endsection
