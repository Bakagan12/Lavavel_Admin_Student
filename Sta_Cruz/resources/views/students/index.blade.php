@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Logout Button at the upper-right corner -->
                <h1>Student Lists</h1>
                <div style="display:flex; justify-content:end">
                    <a href="{{ route('students.create') }}" class="mb-3 btn btn-success">Create Student</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->fname }}</td>
                                <td>{{ $student->lname }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">Show</a>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Position the logout button at the top right corner */
        .btn-logout {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .btn-logout button {
            background-color: #ff4757;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-logout button:hover {
            background-color: #e84118;
        }
    </style>
@endsection
