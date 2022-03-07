@extends('template')
@section('content')

<input type="text" placeholder="Instructor Name...">

{{-- might need to put all this ina  scrollview later --}}
<table>
    <tr>
    {{-- Cai said only Sat, so if anyone whines that all the days aren't here, i will eat you --}}
      <th>Instructor</th>
      <th>Monday</th>
      <th>Tuesday</th>
      <th>Wednesday</th>
      <th>Thursday</th>
      <th>Friday</th>
      <th>Saturday</th>
    </tr>
    {{-- again, use a foreach to go through db once it's setup --}}
    <tr>
      <td>Alfreds Futterkiste</td>
      {{-- dynamically changing the backgrounds shouldn't be hard with a bit of JS in the controller,
      over a certain threshold and background colour = blue or something --}}
      {{-- Monday --}}
      <td>
          <ul>
              <li>6:00 - 7:00</li>
              <li>11:00 - 12:00</li>
              {{-- this should be where the colour would change --}}
              <li>12:00 - 2:00</li>
              <li>3:00 - 5:00</li>
              {{-- change here again --}}
              <li>9:00 - 11:00</li>
          </ul>
      </td>
      {{-- Tuesday --}}
      <td>
        <ul>
            {{-- do something like this if there are no hours, might require some janky workarounds in the forech --}}
            <li>No Hours</li>
        </ul>
    </td>
    {{-- Wednesday --}}
    <td>
        <ul>
            <li>6:00 - 7:00</li>
            <li>11:00 - 12:00</li>
            {{-- this should be where the colour would change --}}
            <li>12:00 - 2:00</li>
            <li>3:00 - 5:00</li>
            {{-- change here again --}}
            <li>9:00 - 11:00</li>
        </ul>
    </td>
    {{-- Thursday --}}
    <td>
        <ul>
            <li>6:00 - 7:00</li>
            <li>11:00 - 12:00</li>
            {{-- this should be where the colour would change --}}
            <li>12:00 - 2:00</li>
            <li>3:00 - 5:00</li>
            {{-- change here again --}}
            <li>9:00 - 11:00</li>
        </ul>
    </td>
    {{-- Friday --}}
    <td>
        <ul>
            <li>6:00 - 7:00</li>
            <li>11:00 - 12:00</li>
            {{-- this should be where the colour would change --}}
            <li>12:00 - 2:00</li>
            <li>3:00 - 5:00</li>
            {{-- change here again --}}
            <li>9:00 - 11:00</li>
        </ul>
    </td>
    {{-- Saturday --}}
    <td>
        <ul>
            {{-- do something like this if there are no hours, might require some janky workarounds in the forech --}}
            <li>No Hours</li>
        </ul>
    </td>
    </tr>
  </table>

  {{-- could make an invisible form which appears when this button is clicked --}}
  <button type="button">Export</button>

@endsection
