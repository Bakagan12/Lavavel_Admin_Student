@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Student Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                        <p class="card-text"><strong>Gender:</strong> {{ $student->gender }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('students.index') }}" class="btn btn-link">Back to all students</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
