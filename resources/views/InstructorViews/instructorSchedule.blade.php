@extends('template')
@section('content')

{{-- TODO link this to appropriate controller --}}
<form action="submitHours" method="POST">
    {{-- div for each day should be something like this --}}
    <div class="form-group">
        {{-- start time field --}}
        <label for="startTime">Enter your start time</label>
        <input type="time" name="startTime" class="form-control" id="startTime">
        {{-- end time field --}}
        <label for="endTime">Enter your end time</label>
        <input type="time" name="endTime" class="form-control" id="endTime">
        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
        <button type="button" class="btn btn-primary text-center">Set</button>
        {{-- table to hold the times --}}
        <table>
            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
            <tr>10:00<td><button class="editbtn">edit</button></td></tr>
        </table>
    </div>
    <button type="submit" class="btn btn-primary text-center">Submit</button>
</form>

@endsection
