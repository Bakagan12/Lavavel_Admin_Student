<!-- resources/views/student/dashboard.blade.php -->

@extends('layouts.student')

@section('title', 'Student Dashboard')

@section('content')
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Info</h5>
                    <ul>
                        <li>Name: {{ $user->name }}</li>
                        <li>Email: {{ $user->email }}</li>
                        <li>Role: {{ $user->role_name }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h3>Welcome to Your Dashboard, {{ $user->name }}!</h3>
                    <p>Here is an overview of your current courses and assignments:</p>

                    <!-- Example of displaying courses -->
                    <div class="mt-4">
                        <h5>Your Courses:</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Mathematics 101</li>
                            <li class="list-group-item">Physics 202</li>
                            <li class="list-group-item">Computer Science 303</li>
                        </ul>
                    </div>

                    <!-- Example of assignments -->
                    <div class="mt-4">
                        <h5>Your Assignments:</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Math Assignment 1 - Due: 2025-03-25</li>
                            <li class="list-group-item">Physics Lab Report - Due: 2025-03-30</li>
                            <li class="list-group-item">CS Project - Due: 2025-04-10</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
