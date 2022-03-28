@extends('navBarTemplate')
@section('content')


        <div class="col-8">
            <h1 class="pb-5 pt-5 display-3">Unresponsive Instructors</h1>
            <input class="form-control form-control-lg" type="text" placeholder="Name...">

            <table class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        {{-- empty placeholder that may be helpful for formatting --}}
                        <th></th>
                    </tr>
                </thead>
                {{-- again, use a foreach to go through db once it's setup --}}
                <tbody>
                    <tr>
                        <td>Alfreds</td>
                        <td>Futterkiste</td>
                        <td>AFutterkiste@example.com</td>
                        <td>5555555555</td>
                        <td>
                            {{-- TODO link these to actually do something --}}
                            <button type="button" class="btn btn-primary">email</button>
                            <button type="button" class="btn btn-danger">deactivate</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-success float-end" style="width: 150px">Resend all Emails</button>
        </div>
    </div>
</div>

@endsection
