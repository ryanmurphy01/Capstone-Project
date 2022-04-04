<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b>
        are :</p>
        <h2>Instructor Details</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach($details as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>