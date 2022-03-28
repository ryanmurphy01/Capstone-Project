@extends('navBarTemplate')
@section('content')


        <div class="col py-3">
            <h1 class="text-center text-success pt-2">Welcome Instructor!</h1>
            <h5 class="text-center p-1">The text below provides a brief overview of functionality of this application</h5>

            <section class="p-5">
                <h2 class="text-success">Availability</h2>
                <p>
                    Here you can set your working hours. Once on the page, enter your start and end time,
                    then hit save to add it to the list. Use the delete buttons if you've added an entry by mistake.
                </p>
                <p>
                    Once you have your hours set for every day, press the submit button on the bottom right.
                </p>
             </section>
             <section class="p-5">
                <h2 class="text-success">Courses</h2>
                <p>
                Here you select what courses you want to teach. These selections will be sent to administrators who will decide if it's approved.
                Based on what you have taught before, the approval may be automatic.
                </p>
                <p>
                On the page, select the program and courses within that program via dropdown. Add them to the submission list with the green button.
                Once all the courses you wish to teach are in the submission list, press the red button and confirm your selection.
                </p>
             </section>


        </div>
    </div>
</div>

@endsection
