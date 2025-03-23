@extends('layouts.app')

@section('content')

  <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <div class="row">
      <!-- Total Users Card -->
      <div class="mb-10">
        <div class="card shadow-lg text-center">
          <div class="card-body">
            <h5 class="card-title">Total Users</h5>
            <p class="display-4">{{$user_count}}</p>
            <p class="text-muted">Total registered users in the system</p>
          </div>
        </div>
      </div>

      <!-- Total Students Card -->
      <div class="mb-5">
        <div class="card shadow-lg text-center">
          <div class="card-body">
            <h5 class="card-title">Total Students</h5>
            <p class="display-4">{{$student_count}}</p>
            <p class="text-muted">Total number of students enrolled</p>
          </div>
        </div>
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
