@extends('template')
@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-0 col-xl-0 px-sm-2 px-0">
            {{-- extra style, border to make the bar actually visible lol --}}
            <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-2 min-vh-100" style="border-right: 1px solid black;">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto link-dark text-decoration-none justify-center">
                    <span class="d-none d-sm-inline text-center" style="font-size: 18pt;">Instructor Panel</span>
                </a>
                {{-- make both of these max width so the active box fills all the space, also add a touch of margin so it doesn't touch the edge --}}
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu" style="width: 100%; margin-right: 10px">                    <li class="nav-item" style="width: 100%">
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="{{ route('welcome') }}" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Welcome</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="{{ route('schedule.index') }}" class="nav-link align-middle px-0 link-dark active">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Availability</span>
                        </a>
                    </li>
                    <li class="nav-item" style="width: 100%">
                        {{-- link goes here --}}
                        <a href="coursesReq" class="nav-link align-middle px-0 link-dark">
                            {{-- extra width and height to compensate padding which makes it smaller, also margin and padding to make it centered in small version --}}
                            {{-- styles: style="padding-bottom: 5px; margin-left: 5px". make the image height and width 30 --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16" style="padding-bottom: 5px; margin-left: 5px">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            {{-- font size bigger so you can actually see it --}}
                            <span class="ms-1 d-none d-sm-inline" style="font-size: 14pt;">Courses</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4" style="border-top: 1px solid black; width: 100%; padding-top: 20px">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- insert profile pic/icon here here --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        {{-- <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col py-3" >
            <div class="container-fluid">
                <h2 class="pb-5 text-center">Current Semester: {{$currentSemester->name}} ({{$currentSemester->code}})</h2>
                <div class="row">
                <div class="col">
                {{-- Monday Section --}}
                <form method="post" action="{{ route('schedule.add', $account) }}">
                 @csrf
                <div class="form-group" style="width: 300px;">
                    <div class="col">
                        <h2 class="text-center">Monday</h2>
                        <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                        {{-- Hidden Field for day id--}}
                        <input type="hidden" name="day" value="1">
                         {{-- Hidden Field for account_id--}}
                         <input type="hidden" name="accountId" value="{{session('LoggedUser')}}">
                        {{-- start time field --}}
                        <label for="startTime">Enter your start time</label>
                        <input type="time" name="startTime" class="form-control" id="startTime">
                        {{-- end time field --}}
                        <label for="endTime">Enter your end time</label>
                        <input type="time" name="endTime" class="form-control" id="endTime">
                        {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                        <button type="submit" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                    </form>
                        {{-- table to hold the times --}}
                        <div class="border-bottom border-dark border-2 mt-5">

                        <table  class="table table-hover  text-center mt-5">
                            <thead>
                            <th >Times added</th>
                            </thead>
                            {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                            @foreach ($mondayTimes as $mondayTime)
                            <tr >
                                <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$mondayTime->start_time)->format('h:i A')}}-{{ \Carbon\Carbon::createFromFormat('H:i:s',$mondayTime->end_time)->format('h:i A')}}
                                    <form style="display: inline-block" action="{{ route('schedule.delete',$mondayTime->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" id="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle" viewBox="0 0 20 20">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                            </button>


                                    </form>
                                </td>

                            </tr>
                            @endforeach

                        </table>
                        </div>
                    </div>
                </div>
                </div>

                </div>
                <div class="col">
                   {{-- Tuesday Section --}}
                <form method="post" action="{{ route('schedule.add', $account) }}">
                    @csrf
                   <div class="form-group" style="width: 300px;">
                       <div class="col">
                           <h2 class="text-center">Tuesday</h2>
                           <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                           {{-- Hidden Field for day id--}}
                           <input type="hidden" name="day" value="2">
                            {{-- Hidden Field for account_id--}}
                            <input type="hidden" name="accountId" value="{{session('LoggedUser')}}">
                           {{-- start time field --}}
                           <label for="startTime">Enter your start time</label>
                           <input type="time" name="startTime" class="form-control" id="startTime">
                           {{-- end time field --}}
                           <label for="endTime">Enter your end time</label>
                           <input type="time" name="endTime" class="form-control" id="endTime">
                           {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                           <button type="submit" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                          </form>
                           {{-- table to hold the times --}}
                           <div class="border-bottom border-dark border-2 mt-5">

                           <table  class="table table-hover  text-center mt-5">
                               <thead>
                               <th >Times added</th>
                               </thead>
                               {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                               @foreach ($tuesdayTimes as $tuesdayTime)
                               <tr >
                                   <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$tuesdayTime->start_time)->format('h:i A')}}-{{ \Carbon\Carbon::createFromFormat('H:i:s',$tuesdayTime->end_time)->format('h:i A')}}

                                    <form style="display: inline-block" action="{{ route('schedule.delete',$tuesdayTime->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" id="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle" viewBox="0 0 20 20">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                            </button>


                                    </form>
                                </td>
                               </tr>
                               @endforeach

                           </table>
                           </div>
                       </div>
                   </div>
                   </div>

                </div>

                <div class="col">
                   {{-- Wednesday Section --}}
                <form method="post" action="{{ route('schedule.add', $account) }}">
                    @csrf
                   <div class="form-group" style="width: 300px;">
                       <div class="col">
                           <h2 class="text-center">Wednesday</h2>
                           <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                           {{-- Hidden Field for day id--}}
                           <input type="hidden" name="day" value="3">
                            {{-- Hidden Field for account_id--}}
                            <input type="hidden" name="accountId" value="{{session('LoggedUser')}}">
                           {{-- start time field --}}
                           <label for="startTime">Enter your start time</label>
                           <input type="time" name="startTime" class="form-control" id="startTime">
                           {{-- end time field --}}
                           <label for="endTime">Enter your end time</label>
                           <input type="time" name="endTime" class="form-control" id="endTime">
                           {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                           <button type="submit" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        </form>
                           {{-- table to hold the times --}}
                           <div class="border-bottom border-dark border-2 mt-5">

                           <table  class="table table-hover  text-center mt-5">
                               <thead>
                               <th >Times added</th>
                               </thead>
                               {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                               @foreach ($wednesdayTimes as $wednesdayTime)
                               <tr >
                                   <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$wednesdayTime->start_time)->format('h:i A')}}-{{ \Carbon\Carbon::createFromFormat('H:i:s',$wednesdayTime->end_time)->format('h:i A')}}

                                    <form style="display: inline-block" action="{{ route('schedule.delete',$wednesdayTime->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" id="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle" viewBox="0 0 20 20">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                            </button>


                                    </form>
                                </td>
                               </tr>
                               @endforeach

                           </table>
                           </div>
                       </div>
                   </div>
                   </div>

                </div>
                </div>
                <div class="row">

                <div class="col">
                   {{-- Thursday Section --}}
                <form method="post" action="{{ route('schedule.add', $account) }}">
                    @csrf
                   <div class="form-group" style="width: 300px;">
                       <div class="col">
                           <h2 class="text-center">Thursday</h2>
                           <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                           {{-- Hidden Field for day id--}}
                           <input type="hidden" name="day" value="4">
                            {{-- Hidden Field for account_id--}}
                            <input type="hidden" name="accountId" value="{{session('LoggedUser')}}">
                           {{-- start time field --}}
                           <label for="startTime">Enter your start time</label>
                           <input type="time" name="startTime" class="form-control" id="startTime">
                           {{-- end time field --}}
                           <label for="endTime">Enter your end time</label>
                           <input type="time" name="endTime" class="form-control" id="endTime">
                           {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                           <button type="submit" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        </form>
                           {{-- table to hold the times --}}
                           <div class="border-bottom border-dark border-2 mt-5">

                           <table  class="table table-hover  text-center mt-5">
                               <thead>
                               <th >Times added</th>
                               </thead>
                               {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                               @foreach ($thursdayTimes as $thursdayTime)
                               <tr >
                                   <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$thursdayTime->start_time)->format('h:i A')}}-{{ \Carbon\Carbon::createFromFormat('H:i:s',$thursdayTime->end_time)->format('h:i A')}}

                                    <form style="display: inline-block" action="{{ route('schedule.delete',$thursdayTime->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" id="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle" viewBox="0 0 20 20">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                            </button>


                                    </form>
                                </td>
                               </tr>
                               @endforeach

                           </table>
                           </div>
                       </div>
                   </div>
                   </div>

                </div>

                <div class="col">
                   {{-- Friday Section --}}
                <form method="post" action="{{ route('schedule.add', $account) }}">
                    @csrf
                   <div class="form-group" style="width: 300px;">
                       <div class="col">
                           <h2 class="text-center">Friday</h2>
                           <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                           {{-- Hidden Field for day id--}}
                           <input type="hidden" name="day" value="5">
                            {{-- Hidden Field for account_id--}}
                            <input type="hidden" name="accountId" value="{{session('LoggedUser')}}">
                           {{-- start time field --}}
                           <label for="startTime">Enter your start time</label>
                           <input type="time" name="startTime" class="form-control" id="startTime">
                           {{-- end time field --}}
                           <label for="endTime">Enter your end time</label>
                           <input type="time" name="endTime" class="form-control" id="endTime">
                           {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                           <button type="submit" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                        </form>
                           {{-- table to hold the times --}}
                           <div class="border-bottom border-dark border-2 mt-5">

                           <table  class="table table-hover  text-center mt-5">
                               <thead>
                               <th >Times added</th>
                               </thead>
                               {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                               @foreach ($fridayTimes as $fridayTime)
                               <tr >
                                   <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$fridayTime->start_time)->format('h:i A')}}-{{ \Carbon\Carbon::createFromFormat('H:i:s',$fridayTime->end_time)->format('h:i A')}}

                                    <form style="display: inline-block" action="{{ route('schedule.delete',$fridayTime->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" id="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle" viewBox="0 0 20 20">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                            </button>


                                    </form>
                                </td>
                               </tr>
                               @endforeach

                           </table>
                           </div>
                       </div>
                   </div>
                   </div>
                </div>

                <div class="col">
                   {{-- Saturday Section --}}
                <form method="post" action="{{ route('schedule.add', $account) }}">
                    @csrf
                   <div class="form-group" style="width: 300px;">
                       <div class="col">
                           <h2 class="text-center">Saturday</h2>
                           <div class="border border-dark m-3 p-3 bg-secondary" style="--bs-bg-opacity: .20;">
                           {{-- Hidden Field for day id--}}
                           <input type="hidden" name="day" value="6">
                            {{-- Hidden Field for account_id--}}
                            <input type="hidden" name="accountId" value="{{session('LoggedUser')}}">
                           {{-- start time field --}}
                           <label for="startTime">Enter your start time</label>
                           <input type="time" name="startTime" class="form-control" id="startTime">
                           {{-- end time field --}}
                           <label for="endTime">Enter your end time</label>
                           <input type="time" name="endTime" class="form-control" id="endTime">
                           {{-- button to save it to the table below, program functionality in controller or right here maybe, still wip --}}
                           <button type="submit" class="btn btn-primary text-center float-end mt-2 bg-success border border-dark">Add</button>
                           </form>
                           {{-- table to hold the times --}}
                           <div class="border-bottom border-dark border-2 mt-5">

                           <table  class="table table-hover  text-center mt-5">
                               <thead>
                               <th >Times added</th>
                               </thead>
                               {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
                               @foreach ($saturdayTimes as $saturdayTime)
                               <tr >
                                   <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$saturdayTime->start_time)->format('h:i A')}}-{{ \Carbon\Carbon::createFromFormat('H:i:s',$saturdayTime->end_time)->format('h:i A')}}

                                    <form style="display: inline-block" action="{{ route('schedule.delete',$saturdayTime->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" id="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle" viewBox="0 0 20 20">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                            </button>


                                    </form>
                                </td>
                               </tr>
                               @endforeach

                           </table>
                           </div>
                       </div>
                   </div>
                   </div>
                </div>
                <div>
                    <form method="post" action="{{ route('submitHours', session('LoggedUser')) }}">
                        @csrf
                        <div>
                            <label for="courseLoad" class="ms-3 mt-3 mb-1" style="font-weight: bold">Maximum Hours (ex. 8 per week)</label>
                            <div class="input-group" style="width: 250px;">
                                <input name="courseLoad" id="courseLoad" type="number" min=0 value="{{ $details->num_of_courses ?? 0 }}" class="form-control text-center ms-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                    {{-- <label for="courseLoad" class="ms-3 mt-3 mb-1">Maximum Course Load</label>
                    <p name="courseLoad" id="courseLoad" type="text" class="form-control text-center ms-3" style="width: 150px;" >ex. 0</p> --}}
                </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
