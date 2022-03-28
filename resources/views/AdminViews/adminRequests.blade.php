@extends('navBarTemplate')
@section('content')


        <div class="col py-3">
            <h1>Course Requests</h1>

            {{-- the key for the little circles --}}
            <div class="container" >
                <div class="row row-cols-auto float-end mb-3">
                <div class="col text-center">
                    <h3>Approve</h3>
                    <svg height="50" width="50">
                        <circle cx="25" cy="25" r="20" stroke="black" stroke-width="3" fill="green" />
                    </svg>
                </div>
                <div class="col text-center">
                    <h3>Pending</h3>
                    <svg height="50" width="50">
                        <circle cx="25" cy="25" r="20" stroke="black" stroke-width="3" fill="orange" />
                    </svg>
                </div>
                <div class="col text-center">
                    <h3>Deny</h3>
                    <svg height="50" width="50">
                        <circle cx="25" cy="25" r="20" stroke="black" stroke-width="3" fill="red" />
                    </svg>
                </div>
                </div>
            </div>

            <table class="table table-striped table-hover mx-auto">
                <tr>
                <th>Instructor Name</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Status</th>
                </tr>
                {{-- again, use a foreach to go through db once it's setup --}}
                <tr>
                <td>Philip Rosen</td>
                <td>HTML and CSS</td>
                <td>WEB110</td>
                {{-- make the image an onclick once we get into controllers and stuff --}}
                <td>
                    <svg height="30" width="30">
                        <circle cx="15" cy="15" r="10" stroke="black" stroke-width="3" fill="orange" />
                    </svg>
                </td>
                </tr>
            </table>

            {{-- the thing in the url is the route name of the destination page, see web.php --}}
            <button onclick="document.location='{{ url('approvedRequests') }}'" style="width: 150px" class="m-2 btn btn-success border-dark float-end">Approved</button>
            <button onclick="document.location='{{ url('deniedRequests') }}'" style="width: 150px" class="m-2 btn btn-success border-dark float-end">Denied</button>
        </div>
    </div>
</div>

@endsection
