@extends('template')
@section('content')

<label for="selectPrograms">Program</label>
<select name="selectPrograms" id="selectPrograms">
    {{-- use some kind of foreach to pull from the database once that's setup, but for now placeholder --}}
    <option value="B990">Mobile Applications Development</option>
</select>

<label for="selectCourses">Courses</label>
<select name="selectCourses" id="selectCourses">
    {{-- again some kind of foreach, probably with a condition checking for the matching program above --}}
    {{-- also an 'on hover' here or something that checks program for updated value before showing coruses --}}
    <option value="MAD201">Java Programming I</option>
</select>

{{-- might need to make this whole section into a form, or have some other way to capture the course inputs --}}
{{-- also buttons may need ids --}}
<button type="button" class="btn btn-primary text-center">Add to List</button>

<p>
    This course introduces students to the fundamental programming concepts using the Java language.
    Students will learn the proper use of control structures such as selection looping and modularization.
    They will also become proficient at using the basic Java syntax to implement program designs.
    Students will learn how a language such as Java handles various primitive data types and how standard classes
    are used to support the storage and manipulation of more complex data. Students will be introduced to "Encapsulation"
    the first concept of Object Oriented Programming (OOP).
</p>

{{-- table to hold the selected courses --}}
<table>
    {{-- replace the button text with icon, or just replace it entirely with an image and add an onclick --}}
    <tr>Java Programming I - MAD201<td><button class="editbtn">edit</button></td></tr>
</table>

@endsection
