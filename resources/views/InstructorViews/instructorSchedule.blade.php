@extends('navBarTemplate')
@section('content')



        <div class="col py-3" >
            {{-- TODO link this to appropriate controller --}}
            <form action="submitHours" method="POST">
                {{-- div for each day should be something like this --}}

            <div class="container">
                <div class="row">

                {{-- Monday Section --}}
                <div class="form-group" style="width: 300px;">
                    <div class="col">
                        <h2 class="text-center">Monday</h2>
                        <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                        {{-- start time field --}}
                        <label for="startTime">Enter your start time</label>
                        <input type="time" name="startTime" class="form-control" id="startTime">
                        {{-- end time field --}}
                        <label for="endTime">Enter your end time</label>
                        <input type="time" name="endTime" class="form-control" id="endTime">
                        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                        <button type="button" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        {{-- table to hold the times --}}
                        <div class="border-bottom border-dark border-2 mt-5">

                        <table  class="table table-hover  text-center mt-5">
                            <thead>
                            <th >Times added</th>
                            </thead>
                            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                            <tr >
                                <td>10:00 - 15:00</td>
                            </tr>
                            <tr ><td>10:00 - 15:00</td></tr>
                        </table>
                        </div>
                    </div>
                </div>
                </div>

                {{-- Tuesday Section --}}
                <div class="form-group " style="width: 300px;">
                    <div class="col">
                        <h2 class="text-center">Tuesday</h2>
                        <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                        {{-- start time field --}}
                        <label for="startTime">Enter your start time</label>
                        <input type="time" name="startTime" class="form-control" id="startTime">
                        {{-- end time field --}}
                        <label for="endTime">Enter your end time</label>
                        <input type="time" name="endTime" class="form-control" id="endTime">
                        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                        <button type="button" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        {{-- table to hold the times --}}
                        <div class="border-bottom border-dark border-2 mt-5">

                        <table  class="table table-hover  text-center mt-5">
                            <thead>
                            <th >Times added</th>
                            </thead>
                            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                            <tr >
                                <td>10:00 - 15:00</td>
                            </tr>
                            <tr ><td>10:00 - 15:00</td></tr>
                        </table>
                        </div>
                    </div>
                </div>
                </div>

                {{-- Wednesday Section --}}
                <div class="form-group " style="width: 300px;">
                    <div class="col">
                        <h2 class="text-center">Wednesday</h2>
                        <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                        {{-- start time field --}}
                        <label for="startTime">Enter your start time</label>
                        <input type="time" name="startTime" class="form-control" id="startTime">
                        {{-- end time field --}}
                        <label for="endTime">Enter your end time</label>
                        <input type="time" name="endTime" class="form-control" id="endTime">
                        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                        <button type="button" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        {{-- table to hold the times --}}
                        <div class="border-bottom border-dark border-2 mt-5">

                        <table  class="table table-hover  text-center mt-5">
                            <thead>
                            <th >Times added</th>
                            </thead>
                            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                            <tr >
                                <td>10:00 - 15:00</td>
                            </tr>
                            <tr ><td>10:00 - 15:00</td></tr>
                        </table>
                        </div>
                    </div>
                </div>
                        </div>
                </div>

                <div class="row">
                {{-- Thursday Section --}}
                <div class="form-group pt-4" style="width: 300px;">
                    <div class="col">
                        <h2 class="text-center">Thursday</h2>
                        <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                        {{-- start time field --}}
                        <label for="startTime">Enter your start time</label>
                        <input type="time" name="startTime" class="form-control" id="startTime">
                        {{-- end time field --}}
                        <label for="endTime">Enter your end time</label>
                        <input type="time" name="endTime" class="form-control" id="endTime">
                        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                        <button type="button" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        {{-- table to hold the times --}}
                        <div class="border-bottom border-dark border-2 mt-5">

                        <table  class="table table-hover  text-center mt-5">
                            <thead>
                            <th >Times added</th>
                            </thead>
                            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                            <tr >
                                <td>10:00 - 15:00</td>
                            </tr>
                            <tr ><td>10:00 - 15:00</td></tr>
                        </table>
                        </div>
                    </div>
                </div>
                </div>

                {{-- Friday Section --}}
                <div class="form-group pt-4" style="width: 300px;">
                    <div class="col">
                        <h2 class="text-center">Friday</h2>
                        <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                        {{-- start time field --}}
                        <label for="startTime">Enter your start time</label>
                        <input type="time" name="startTime" class="form-control" id="startTime">
                        {{-- end time field --}}
                        <label for="endTime">Enter your end time</label>
                        <input type="time" name="endTime" class="form-control" id="endTime">
                        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                        <button type="button" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        {{-- table to hold the times --}}
                        <div class="border-bottom border-dark border-2 mt-5">

                        <table  class="table table-hover  text-center mt-5">
                            <thead>
                            <th >Times added</th>
                            </thead>
                            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                            <tr >
                                <td>10:00 - 15:00</td>
                            </tr>
                            <tr ><td>10:00 - 15:00</td></tr>
                        </table>
                        </div>
                    </div>
                </div>
                </div>

                {{-- Saturday Section --}}
                <div class="form-group pt-4" style="width: 300px;">
                    <div class="col">
                        <h2 class="text-center">Saturday</h2>
                        <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                        {{-- start time field --}}
                        <label for="startTime">Enter your start time</label>
                        <input type="time" name="startTime" class="form-control" id="startTime">
                        {{-- end time field --}}
                        <label for="endTime">Enter your end time</label>
                        <input type="time" name="endTime" class="form-control" id="endTime">
                        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                        <button type="button" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        {{-- table to hold the times --}}
                        <div class="border-bottom border-dark border-2 mt-5">

                        <table  class="table table-hover  text-center mt-5">
                            <thead>
                            <th >Times added</th>
                            </thead>
                            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                            <tr >
                                <td>10:00 - 15:00</td>
                            </tr>
                            <tr ><td>10:00 - 15:00</td></tr>
                        </table>
                        </div>
                    </div>
                </div>
                </div>
                <div>
                <label for="courseLoad" class="ms-3 mt-3 mb-1">Maximum Course Load</label>
                <p name="courseLoad" id="courseLoad" type="text" class="form-control text-center ms-3" style="width: 150px;" >ex. 0</p>
                <button type="submit" class="btn btn-primary text-center float-end m-5 bg-warning text-black border border-dark" style="width: 150px;">Submit</button>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>

@endsection
