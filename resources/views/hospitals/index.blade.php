@extends('layouts.app')

@section('content')

<div class="col-md-10 col-lg-10 float-left">
    <h2 style="text-align:center; font-weight:700;"><u>OTHER HOSPITALS</u></h2>
    <div class="panel bg-warning">
        <table class="table table-hover" id="dev-table">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Hospital Name</th>
                <th>Location</th>
                <th>Grade</th>
              </tr>
            </thead>
        @foreach($hospitals as $hospital)
            <tbody>
              <tr>
                <td>{{ ++$i }}</td>
                <td><a href="show_doctors/{{$hospital->id}}">{{ $hospital->hospital_name }}</a></td>
                <td>{{ $hospital->location }}</td>
                <td>{{ $hospital->grade_id }}</td>

              </tr>

            </tbody>

        @endforeach
            </table>
    </div>
    </div>
</div>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 float-right" style="border-left:1px solid black; height:100vh;">
    <div class="sidebar-module">
      <h3>Actions</h3>
      <hr>
      <ol class="list-unstyled">
        <li><a href="{{ route('home',$hospital->id) }}"><i class="fas fa-home"></i>Home</a></li>
        <br>
        <li><a href="{{ route('patients.index') }}"><i class="fas fa-hospital-user"></i> Patients List</a></li>
        <br>


        @if(Auth::user()->role_id == 2)
        <li><a href="/patients/create"><i class="fas fa-book"></i> Add Patient</a></li>
        <br>
        @endif

        </ol>
        </div>
    </div>
    </div>

@endsection
