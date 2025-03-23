@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Student</h1>
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="{{ $student->fname }}" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="{{ $student->lname }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male"@if($student->gender == "Male"){"selected"} @endif>Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBT">LGBT</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="gender" name="gender" value="{{ $student->gender }}" required> -->
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
