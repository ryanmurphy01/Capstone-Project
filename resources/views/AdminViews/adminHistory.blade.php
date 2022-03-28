@extends('navBarTemplate')
@section('content')


        <div class="col-8">
            <h1 class="pb-5 pt-5 display-3">Instructor Course History</h1>
            <input type="text" placeholder="Instructor or Course Code..." class="form-control form-control-lg">

            <table class="table table-hover table-striped mx-auto text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Instructor Name</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($accounts as $account)
                        <tr>
                            <td><a href="courseHistory/{{ $account->id }}" class="link-dark" style="font-size: 14pt">{{ $account->first_name }} {{ $account->last_name }}</a></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
