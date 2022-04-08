@extends('navBarTemplate')
@section('content')

        <div class="col py-3">
        <h1 class="pb-3 pt-3 ">Instructor Availability</h1>
            <input type="text" placeholder="Instructor Name..." class="mb-4 w-100 p-1">

            {{-- might need to put all this in a scrollview later --}}
            <table class="table table-striped table-hover mx-auto text-center">

            {{--Days of the weeks header--}}
            <thead>
                <tr>
                {{-- Cai said only Sat, so if anyone whines that all the days aren't here, i will eat you --}}
                <th scope="col">Instructor</th>
                <th scope="col">Monday</th>
                <th scope="col">Tuesday</th>
                <th scope="col">Wednesday</th>
                <th scope="col">Thursday</th>
                <th scope="col">Friday</th>
                <th scope="col">Saturday</th>
                </tr>
            </thead>

                {{-- again, use a foreach to go through db once it's setup --}}
            <tbody>
                <tr>
            {{--Instructors Names--}}
                    <td  style="width: 50px;">
                        <ul style="list-style: none;">
                        <li class="text-center"><strong>Alfreds</strong></li>
                        <li class="text-center"><strong>Futterkiste</strong></li>
                        </ul>
                    </td>


                {{-- dynamically changing the backgrounds shouldn't be hard with a bit of JS in the controller,
                over a certain threshold and background colour = blue or something --}}
            {{-- Monday Time block--}}
                <td>
                    <ul style="list-style: none;">
                    <div class="border border-1 border-dark m-1">
                    <div class="bg-info">
                        <li>6:00 - 7:00</li>
                        <li>11:00 - 12:00</li>
                    </div>

                        {{-- this should be where the colour would change --}}
                    <div class="bg-warning" >
                        <li>12:00 - 2:00</li>
                        <li>3:00 - 5:00</li>
                    </div>

                    <div class="bg-success" style="--bs-bg-opacity: .5">
                        {{-- change here again --}}
                        <li>9:00 - 11:00</li>
                    </div>
                    </div>
                    </ul>
                </td>
            {{-- Tuesday Time block--}}
                <td>
                    <ul  style="list-style: none;">
                    <div class="bg-danger text-light m-1 border border-1 border-dark" style="height: 150px;">
                        {{-- do something like this if there are no hours, might require some janky workarounds in the forech --}}
                        <li class="py-5">No Hours</li>
                    </div>
                    </ul>
                </td>
            {{-- Wednesday Time block--}}
                <td>
                <ul style="list-style: none;">
                    <div class="border border-1 border-dark m-1">
                    <div class="bg-info">
                        <li>6:00 - 7:00</li>
                        <li>11:00 - 12:00</li>
                    </div>

                        {{-- this should be where the colour would change --}}
                    <div class="bg-warning" >
                        <li>12:00 - 2:00</li>
                        <li>3:00 - 5:00</li>
                    </div>

                    <div class="bg-success" style="--bs-bg-opacity: .5">
                        {{-- change here again --}}
                        <li>9:00 - 11:00</li>
                    </div>
                    </div>
                    </ul>
                </td>
            {{-- Thursday Time block--}}
                <td>
                <ul style="list-style: none;">
                    <div class="border border-1 border-dark m-1">
                    <div class="bg-info">
                        <li>6:00 - 7:00</li>
                        <li>11:00 - 12:00</li>
                    </div>

                        {{-- this should be where the colour would change --}}
                    <div class="bg-warning" >
                        <li>12:00 - 2:00</li>
                        <li>3:00 - 5:00</li>
                    </div>

                    <div class="bg-success" style="--bs-bg-opacity: .5">
                        {{-- change here again --}}
                        <li>9:00 - 11:00</li>
                    </div>
                    </div>
                    </ul>
                </td>
            {{-- Friday Time block--}}
                <td>
                <ul style="list-style: none;" >
                    <div class="border border-1 border-dark m-1">
                    <div class="bg-info" >
                        <li>6:00 - 7:00</li>
                        <li>11:00 - 12:00</li>
                    </div>

                        {{-- this should be where the colour would change --}}
                    <div class="bg-warning" >
                        <li>12:00 - 2:00</li>
                        <li>3:00 - 5:00</li>
                    </div>

                    <div class="bg-success" style="--bs-bg-opacity: .5">
                        {{-- change here again --}}
                        <li>9:00 - 11:00</li>
                    </div>
                    </div>
                    </ul>
                </td>
            {{-- Saturday Time block--}}
                <td >
                <ul  style="list-style: none;">
                    <div class="bg-danger text-light m-1 border border-1 border-dark m-1" style="height: 150px;">
                        {{-- do something like this if there are no hours, might require some janky workarounds in the forech --}}
                        <li class="py-5">No Hours</li>
                    </div>
                    </ul>

                </td>
                </tr>
                </tbody>
            </table>

            {{-- could make an invisible form which appears when this button is clicked --}}
            <button type="button" class="my-4 btn btn-success border-dark float-end" style="width: 150px;">Export </button>
        </div>
    </div>
</div>

@endsection
